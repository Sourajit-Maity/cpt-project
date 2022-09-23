# Nurse User Authentication

APIs for managing basic auth functionality

## api/nurse/register




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "name": "John Doe",
    "email": "John@gmail.com",
    "username": "JohnDoe",
    "phone": "9876543210",
    "password": "123456",
    "security_question": "questions",
    "security_answer": "answer",
    "profile_photo": "est",
    "lpn": "123456",
    "can": "123456",
    "documents": "cupiditate",
    "address": "kolkata-700001",
    "country": "1",
    "city": "1",
    "zip": "700001",
    "experience_year": "1",
    "experience_month": "1",
    "terms_and_condiction_1": "0|1",
    "terms_and_condiction_2": "0|1",
    "terms_and_condiction_3": "0|1"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Success! registration completed",
    "data": {
        "first_name": "John",
        "last_name": "Doe",
        "username": "JohnDoe",
        "email": "John@gmail.com",
        "updated_at": "2022-02-28T14:21:58.000000Z",
        "created_at": "2022-02-28T14:21:58.000000Z",
        "id": 6,
        "full_name": "John Doe",
        "role_name": "HOSPITAL-INSTITUTE",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=John&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 3,
                "name": "HOSPITAL-INSTITUTE",
                "guard_name": "web",
                "created_at": "2022-02-28T12:30:26.000000Z",
                "updated_at": "2022-02-28T12:30:26.000000Z",
                "pivot": {
                    "model_id": 6,
                    "role_id": 3,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
```
<div id="execution-results-POSTapi-nurse-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-register"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-register"></code></pre>
</div>
<form id="form-POSTapi-nurse-register" data-method="POST" data-path="api/nurse/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-register" onclick="tryItOut('POSTapi-nurse-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-register" onclick="cancelTryOut('POSTapi-nurse-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>security_question</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="security_question" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>security_answer</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="security_answer" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>profile_photo</code></b>&nbsp;&nbsp;<small>image</small>  &nbsp;
<input type="text" name="profile_photo" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>lpn</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="lpn" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>can</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="can" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>documents</code></b>&nbsp;&nbsp;<small>image</small>  &nbsp;
<input type="text" name="documents" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>country</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>experience_year</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="experience_year" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>experience_month</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="experience_month" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>terms_and_condiction_1</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="terms_and_condiction_1" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>terms_and_condiction_2</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="terms_and_condiction_2" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>terms_and_condiction_3</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="terms_and_condiction_3" data-endpoint="POSTapi-nurse-register" data-component="body" required  hidden>
<br>

</p>

</form>


## api/nurse/login




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "username": "JhoneDoe",
    "password": "12345678"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "token": "6|Imv8VDsE27b1sRclxv91emCSIbLpxLmfvK3wFsAa",
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
```
<div id="execution-results-POSTapi-nurse-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-login"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-login"></code></pre>
</div>
<form id="form-POSTapi-nurse-login" data-method="POST" data-path="api/nurse/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-login" onclick="tryItOut('POSTapi-nurse-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-login" onclick="cancelTryOut('POSTapi-nurse-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-nurse-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-nurse-login" data-component="body" required  hidden>
<br>

</p>

</form>


## api/nurse/social-login




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/social-login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "John@gmail.com"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "token": "6|Imv8VDsE27b1sRclxv91emCSIbLpxLmfvK3wFsAa",
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
```
<div id="execution-results-POSTapi-nurse-social-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-social-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-social-login"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-social-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-social-login"></code></pre>
</div>
<form id="form-POSTapi-nurse-social-login" data-method="POST" data-path="api/nurse/social-login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-social-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-social-login" onclick="tryItOut('POSTapi-nurse-social-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-social-login" onclick="cancelTryOut('POSTapi-nurse-social-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-social-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/social-login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-nurse-social-login" data-component="body" required  hidden>
<br>

</p>

</form>


## api/nurse/social-register




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/social-register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "John@gmail.com",
    "username": "JohnDoe",
    "phone": "9876543210",
    "password": "123456"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Success! registration completed",
    "data": {
        "first_name": "John",
        "last_name": "Doe",
        "username": "JohnDoe",
        "email": "John@gmail.com",
        "updated_at": "2022-02-28T14:21:58.000000Z",
        "created_at": "2022-02-28T14:21:58.000000Z",
        "id": 6,
        "full_name": "John Doe",
        "role_name": "HOSPITAL-INSTITUTE",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=John&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 3,
                "name": "HOSPITAL-INSTITUTE",
                "guard_name": "web",
                "created_at": "2022-02-28T12:30:26.000000Z",
                "updated_at": "2022-02-28T12:30:26.000000Z",
                "pivot": {
                    "model_id": 6,
                    "role_id": 3,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
```
<div id="execution-results-POSTapi-nurse-social-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-social-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-social-register"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-social-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-social-register"></code></pre>
</div>
<form id="form-POSTapi-nurse-social-register" data-method="POST" data-path="api/nurse/social-register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-social-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-social-register" onclick="tryItOut('POSTapi-nurse-social-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-social-register" onclick="cancelTryOut('POSTapi-nurse-social-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-social-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/social-register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-nurse-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-nurse-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-nurse-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-nurse-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-nurse-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-nurse-social-register" data-component="body" required  hidden>
<br>

</p>

</form>


## api/nurse/nurse-user-details

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/nurse-user-details"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "data": {
        "first_name": "user",
        "last_name": "nurse",
        "full_name": "user nurse",
        "company_name": null,
        "email": "usernurse9@yopmail.com",
        "date_of_birth": "24\/1\/2021",
        "username": "usernurse9",
        "phone": "1234567891",
        "address": "test",
        "zipcode": "12345",
        "country_name": "test",
        "state_name": null,
        "city_name": "test",
        "licence_number": null,
        "lpn": null,
        "can": null,
        "security_question": "test",
        "security_answer": "test",
        "experience_month": "1",
        "experience_year": "1",
        "experience_id": 1,
        "from_year": "1",
        "to_year": "2",
        "gender": "female",
        "salary": "1266",
        "profile_photo_path": "http:\/\/127.0.0.1:8000\/storage\/1647513994-4132.png",
        "resume_path": "http:\/\/127.0.0.1:8000\/upload\/user_default.png",
        "cover_photo_path": "http:\/\/127.0.0.1:8000\/upload\/user_default.png"
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-nurse-nurse-user-details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-nurse-user-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-nurse-user-details"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-nurse-user-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-nurse-user-details"></code></pre>
</div>
<form id="form-GETapi-nurse-nurse-user-details" data-method="GET" data-path="api/nurse/nurse-user-details" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-nurse-user-details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-nurse-user-details" onclick="tryItOut('GETapi-nurse-nurse-user-details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-nurse-user-details" onclick="cancelTryOut('GETapi-nurse-nurse-user-details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-nurse-user-details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/nurse-user-details</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-nurse-user-details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-nurse-user-details" data-component="header"></label>
</p>
</form>


## Nurse&#039;s profile edit

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/edit-profile"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

const body = new FormData();
body.append('name', 'est');
body.append('date_of_birth', 'voluptatem');
body.append('email', 'est');
body.append('gender', 'laudantium');
body.append('experience_id', 'harum');
body.append('salary', 'cum');
body.append('profile_photo', 'libero');
body.append('cover_photo', 'enim');
body.append('resume', document.querySelector('input[name="resume"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Profile updated successfully"
}
```
<div id="execution-results-POSTapi-nurse-edit-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-edit-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-edit-profile"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-edit-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-edit-profile"></code></pre>
</div>
<form id="form-POSTapi-nurse-edit-profile" data-method="POST" data-path="api/nurse/edit-profile" data-authed="1" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-edit-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-edit-profile" onclick="tryItOut('POSTapi-nurse-edit-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-edit-profile" onclick="cancelTryOut('POSTapi-nurse-edit-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-edit-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/edit-profile</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-edit-profile" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-edit-profile" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-nurse-edit-profile" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>date_of_birth</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="date_of_birth" data-endpoint="POSTapi-nurse-edit-profile" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-nurse-edit-profile" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="gender" data-endpoint="POSTapi-nurse-edit-profile" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>experience_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="experience_id" data-endpoint="POSTapi-nurse-edit-profile" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>salary</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salary" data-endpoint="POSTapi-nurse-edit-profile" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>profile_photo</code></b>&nbsp;&nbsp;<small>image</small>     <i>optional</i> &nbsp;
<input type="text" name="profile_photo" data-endpoint="POSTapi-nurse-edit-profile" data-component="body"  hidden>
<br>
optional
</p>
<p>
<b><code>cover_photo</code></b>&nbsp;&nbsp;<small>image</small>     <i>optional</i> &nbsp;
<input type="text" name="cover_photo" data-endpoint="POSTapi-nurse-edit-profile" data-component="body"  hidden>
<br>
optional
</p>
<p>
<b><code>resume</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="resume" data-endpoint="POSTapi-nurse-edit-profile" data-component="body"  hidden>
<br>
optional
</p>

</form>


## Change Password

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/nurse-change-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "old_password": "est",
    "new_password": "in",
    "confirm_password": "quibusdam"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Password changed successfully"
}
```
<div id="execution-results-POSTapi-nurse-nurse-change-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-nurse-change-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-nurse-change-password"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-nurse-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-nurse-change-password"></code></pre>
</div>
<form id="form-POSTapi-nurse-nurse-change-password" data-method="POST" data-path="api/nurse/nurse-change-password" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-nurse-change-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-nurse-change-password" onclick="tryItOut('POSTapi-nurse-nurse-change-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-nurse-change-password" onclick="cancelTryOut('POSTapi-nurse-nurse-change-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-nurse-change-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/nurse-change-password</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-nurse-change-password" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-nurse-change-password" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>old_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="old_password" data-endpoint="POSTapi-nurse-nurse-change-password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>new_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="new_password" data-endpoint="POSTapi-nurse-nurse-change-password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>confirm_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="confirm_password" data-endpoint="POSTapi-nurse-nurse-change-password" data-component="body" required  hidden>
<br>

</p>

</form>



