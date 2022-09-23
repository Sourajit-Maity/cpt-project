# Hospital User Authentication

APIs for managing basic auth functionality

## api/hospital/register




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/register"
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
<div id="execution-results-POSTapi-hospital-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-register"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-register"></code></pre>
</div>
<form id="form-POSTapi-hospital-register" data-method="POST" data-path="api/hospital/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-register" onclick="tryItOut('POSTapi-hospital-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-register" onclick="cancelTryOut('POSTapi-hospital-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-hospital-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-hospital-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-hospital-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-hospital-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-hospital-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-hospital-register" data-component="body" required  hidden>
<br>

</p>

</form>


## api/hospital/login




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/login"
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
<div id="execution-results-POSTapi-hospital-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-login"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-login"></code></pre>
</div>
<form id="form-POSTapi-hospital-login" data-method="POST" data-path="api/hospital/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-login" onclick="tryItOut('POSTapi-hospital-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-login" onclick="cancelTryOut('POSTapi-hospital-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-hospital-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-hospital-login" data-component="body" required  hidden>
<br>

</p>

</form>


## api/hospital/social-login




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/social-login"
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
<div id="execution-results-POSTapi-hospital-social-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-social-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-social-login"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-social-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-social-login"></code></pre>
</div>
<form id="form-POSTapi-hospital-social-login" data-method="POST" data-path="api/hospital/social-login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-social-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-social-login" onclick="tryItOut('POSTapi-hospital-social-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-social-login" onclick="cancelTryOut('POSTapi-hospital-social-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-social-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/social-login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-hospital-social-login" data-component="body" required  hidden>
<br>

</p>

</form>


## api/hospital/social-register




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/social-register"
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
<div id="execution-results-POSTapi-hospital-social-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-social-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-social-register"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-social-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-social-register"></code></pre>
</div>
<form id="form-POSTapi-hospital-social-register" data-method="POST" data-path="api/hospital/social-register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-social-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-social-register" onclick="tryItOut('POSTapi-hospital-social-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-social-register" onclick="cancelTryOut('POSTapi-hospital-social-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-social-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/social-register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-hospital-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-hospital-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-hospital-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-hospital-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-hospital-social-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-hospital-social-register" data-component="body" required  hidden>
<br>

</p>

</form>


## api/hospital/add-location

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/add-location"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Location successfully updated",
    "data": {
        "id": 5,
        "first_name": "test",
        "last_name": "hospital",
        "company_name": null,
        "email": "dakoqet@vomoto.com",
        "username": "testhospital",
        "phone": "9876543211",
        "address": "JohnDoe",
        "email_verified_at": null,
        "social_id": null,
        "social_account_type": null,
        "profile_photo_path": null,
        "refer_code": null,
        "referrer_id": null,
        "country_id": 1,
        "state_id": null,
        "state_name": null,
        "city_id": 1,
        "city_name": null,
        "zipcode": "700001",
        "experience_year": null,
        "experience_month": null,
        "experience": null,
        "gender": null,
        "salary": null,
        "resume_path": null,
        "date_of_birth": null,
        "licence_number": null,
        "lpn": null,
        "can": null,
        "security_question": null,
        "security_answer": null,
        "otp": null,
        "otp_verified_at": null,
        "is_online": 0,
        "is_online_approve": 0,
        "is_enable_location": 0,
        "is_free": 1,
        "last_latitude": 22.89002,
        "last_longitude": 88.20123,
        "industry_id": null,
        "active": 0,
        "device_token": null,
        "wallet_balance": 0,
        "stripe_customer_id": null,
        "terms_and_condiction_1": "0",
        "terms_and_condiction_2": "0",
        "terms_and_condiction_3": "0",
        "created_at": "2022-03-01T12:49:13.000000Z",
        "updated_at": "2022-03-04T06:12:56.000000Z",
        "stripe_id": null,
        "pm_type": null,
        "pm_last_four": null,
        "trial_ends_at": null,
        "full_name": "test hospital",
        "role_name": "HOSPITAL",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test&color=7F9CF5&background=EBF4FF"
    }
}
```
<div id="execution-results-POSTapi-hospital-add-location" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-add-location"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-add-location"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-add-location" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-add-location"></code></pre>
</div>
<form id="form-POSTapi-hospital-add-location" data-method="POST" data-path="api/hospital/add-location" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-add-location', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-add-location" onclick="tryItOut('POSTapi-hospital-add-location');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-add-location" onclick="cancelTryOut('POSTapi-hospital-add-location');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-add-location" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/add-location</code></b>
</p>
<p>
<label id="auth-POSTapi-hospital-add-location" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-hospital-add-location" data-component="header"></label>
</p>
</form>


## api/user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/user"
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
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
<p>
<label id="auth-GETapi-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user" data-component="header"></label>
</p>
</form>


## api/hospital/address-details




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/address-details"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "address": "kolkata - 700001",
    "country": 1,
    "city": 2,
    "zip": 700001
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
<div id="execution-results-POSTapi-hospital-address-details" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-address-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-address-details"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-address-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-address-details"></code></pre>
</div>
<form id="form-POSTapi-hospital-address-details" data-method="POST" data-path="api/hospital/address-details" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-address-details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-address-details" onclick="tryItOut('POSTapi-hospital-address-details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-address-details" onclick="cancelTryOut('POSTapi-hospital-address-details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-address-details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/address-details</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-hospital-address-details" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>country</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="country" data-endpoint="POSTapi-hospital-address-details" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="city" data-endpoint="POSTapi-hospital-address-details" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="zip" data-endpoint="POSTapi-hospital-address-details" data-component="body" required  hidden>
<br>

</p>

</form>



