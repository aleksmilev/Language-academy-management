<style>
#toggle-form {
    background-color: #e62352;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px 16px;
    cursor: pointer;
    margin-bottom: 10px;
    display: block;
}

.update-form{
    width: 70%;
    margin: 0 auto;
}

.update-form > h2, .my_courses > h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 36px;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    color: #121212BB;
}

#toggle-form:hover {
    background-color: #ff4057;
}

.form-group {
    margin-bottom: 10px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #515151;
}

.form-group input {
    width: calc(100% - 30px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-group input::placeholder {
    color: #999;
}

.submit_logout{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.submit_logout > *{
    transition: 0.5s;
    font-size: 20px;
    font-weight: bold;
    font-family: 'Poppins', sans-serif;
    color: #FFF;
    padding: 10px;
    border-radius: 28px;
}
.submit_logout > *:hover {
    transition: 0.5s;
    cursor: pointer;
}
.submit_logout > button, .submit_logout > a:hover {
    background-color: #121212BB;
}
.submit_logout > button:hover, .submit_logout > a {
    background-color: #e62352;
}
</style>

<?php
$user_id = json_decode($_COOKIE['user_id']); 

$user_info = [
    'email' => $user_id->email,
    'first_name' => $user_id->first_name,
    'last_name' => $user_id->last_name,
    'password' => $user_id->password
]
?>

<div id="update-form" class="update-form">
    <h2>Моят профил</h2>
    <form id="user-form">
        <div class="form-group">
            <label for="email">Електронна поща</label>
            <input type="email" id="email" name="email" placeholder="Въведете вашия имейл" disabled value="<?= $user_info['email'] ?>">
        </div>
        <div class="form-group">
            <label for="first_name">Име</label>
            <input type="text" id="first_name" name="first_name" placeholder="Въведете вашето име" required value="<?= $user_info['first_name'] ?>">
        </div>
        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input type="text" id="last_name" name="last_name" placeholder="Въведете вашата фамилия" required value="<?= $user_info['last_name'] ?>">
        </div>
        <div class="form-group">
            <label for="password">Парола</label>
            <input type="password" id="password" name="password" placeholder="Въведете вашата парола" required value="<?= $user_info['password'] ?>">
        </div>
        <div class="form-group">
            <label for="confirm_password">Потвърди паролата</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Въведете вашата парола" required value="<?= $user_info['password'] ?>">
        </div>

        <div class="submit_logout">
            <button type="submit">Актуализиране</button>
            <a href="/profile/logout">Изход</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('user-form').addEventListener('submit', function(event) {
        event.preventDefault();

        if(this.password.value == this.confirm_password.value) {
            const formData = new FormData();
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('password', document.getElementById('password').value);

            fetch('/api/auth/info', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            })
        }else{
            alert('Паролите не съвпадат!');
        }
    })
</script>

<br><br><br><br>

<style>
.invoice-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px 10px;
    margin: 0 auto;
}

.invoice-title {
    background-color: #e62352;
    padding: 20px;
    color: #fff;
    margin-bottom: 20px;
}

.invoice-title h2 {
    margin: 0 0 5px;
    font-size: 28px; /* Adjusted font size */
}

.invoice-title h3 {
    margin: 0;
    font-size: 24px; /* Adjusted font size */
}

.invoice-container > div > *{
    margin-bottom: 5px;
}

.invoice-details, .client-details, .course-details {
    background-color: #f2f2f2;
    padding: 20px;
    margin-bottom: 20px;
}

.invoice-details h3, .client-details h3, .course-details h3 {
    margin: 0 0 10px;
    font-size: 20px; /* Adjusted font size */
}

.go_profile{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px 0px 50px;
}
.go_profile > a{
    transition: 0.5s;
    font-size: 30px;
    font-weight: bold;
    color: #FFF;
    background-color: #121212BB;
    padding: 20px;
    border-radius: 28px;
}
.go_profile > a:hover{
    transition: 0.5s;
    cursor: pointer;
    background-color: #e62352;
}
</style>

<div id="my_courses" class="my_courses">
    <h2>Моите курсове</h2>
    
    <!-- <div class="invoice-container">
        <div id="invoice-title" class="invoice-title">
            <h2>Здравейте, <span class="client_name"><span></h2>
            <p>Вие успешно се записахте за следния курс:</p>
            <h3>"<span id="course_title"></span>"</h3>
        </div>

        <div id="invoice-details" class="invoice-details">
            <h3>Информация за фактура:</h3>
            <p>Идентификационен номер на фактура: <span id="invoice_id"></span></p>
            <p>Цена на курса: <span id="invoice_price"></span></p>
        </div>

        <div id="client-details" class="client-details">
            <h3>Информация за клиента:</h3>
            <p>Клиентски идентификатор: <span id="client_id"></span></p>
            <p>Email: <span id="client_email"></span></p>
            <p>Име: <span class="client_name"><span></p>
        </div>

        <div id="course-details" class="course-details">
            <h3>Информация за курса:</h3>
            <p>Идентификатор на курса: <span id="course_id"></span></p>
            <p>Преподавател: <span id="course_lecturer"></span></p>
            <p>Ниво на курса: <span id="course_level"></span></p>
            <p>Статус на курса: <span id="course_status"></span></p>
        </div>
    </div> -->
</div>

<script>
    function createInvoiceElement(clientName, courseTitle, invoiceId, invoicePrice, clientId, clientEmail, courseId, courseLecturer, courseLevel, courseStatus) {
        const invoiceContainer = document.createElement('div');
        invoiceContainer.classList.add('invoice-container');

        const invoiceTitle = document.createElement('div');
        invoiceTitle.id = 'invoice-title';
        invoiceTitle.classList.add('invoice-title');
        invoiceTitle.innerHTML = `
            <h2>Здравейте, <span class="client_name">${clientName}</span></h2>
            <p>Вие успешно се записахте за следния курс:</p>
            <h3>"<span id="course_title">${courseTitle}</span>"</h3>
        `;
        invoiceContainer.appendChild(invoiceTitle);

        const invoiceDetails = document.createElement('div');
        invoiceDetails.id = 'invoice-details';
        invoiceDetails.classList.add('invoice-details');
        invoiceDetails.innerHTML = `
            <h3>Информация за фактура:</h3>
            <p>Идентификационен номер на фактура: <span id="invoice_id">${invoiceId}</span></p>
            <p>Цена на курса: <span id="invoice_price">${invoicePrice} BGN</span></p>
        `;
        invoiceContainer.appendChild(invoiceDetails);

        const clientDetails = document.createElement('div');
        clientDetails.id = 'client-details';
        clientDetails.classList.add('client-details');
        clientDetails.innerHTML = `
            <h3>Информация за клиента:</h3>
            <p>Клиентски идентификатор: <span id="client_id">${clientId}</span></p>
            <p>Email: <span id="client_email">${clientEmail}</span></p>
            <p>Име: <span class="client_name">${clientName}</span></p>
        `;
        invoiceContainer.appendChild(clientDetails);

        const courseDetails = document.createElement('div');
        courseDetails.id = 'course-details';
        courseDetails.classList.add('course-details');
        courseDetails.innerHTML = `
            <h3>Информация за курса:</h3>
            <p>Идентификатор на курса: <span id="course_id">${courseId}</span></p>
            <p>Преподавател: <span id="course_lecturer">${courseLecturer}</span></p>
            <p>Ниво на курса: <span id="course_level">${courseLevel}</span></p>
            <p>Статус на курса: <span id="course_status">${courseStatus}</span></p>
        `;
        invoiceContainer.appendChild(courseDetails);

        const parentElement = document.getElementById('my_courses');
        parentElement.appendChild(invoiceContainer);
    }



    fetch('/api/auth/info')
    .then(response => response.json())
    .then(courses => {

        courses.forEach(course => {
            const signId = course.sign_id;
            const clientId = course.client_id;
            const clientEmail = course.client_email;
            const clientName = `${course.client_first_name} ${course.client_last_name}`;
            const courseId = course.course_id;
            const courseTitle = course.course_title;
            const courseDate = course.course_date;
            const courseLecturer = course.course_lecturer;
            const coursePrice = course.course_price;
            const courseLevel = course.course_level;
            const courseStatus = course.course_status;
            createInvoiceElement(clientName, courseTitle, signId, coursePrice, courseId, clientEmail, clientId, courseLecturer, courseLevel, courseStatus);
        });
    });
</script>