# Nurse Jobs

APIs for managing basic job functionality

## api/nurse/hospital-list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/hospital-list"
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
    "message": "",
    "data": [
        {
            "id": 3,
            "first_name": "Columbus",
            "last_name": "Medhurst",
            "company_name": null,
            "email": "jerrod51@example.net",
            "username": null,
            "phone": "+18585968930",
            "address": null,
            "email_verified_at": "2022-03-01T07:05:57.000000Z",
            "social_id": null,
            "social_account_type": null,
            "profile_photo_path": null,
            "refer_code": null,
            "referrer_id": null,
            "country_id": null,
            "state_id": null,
            "state_name": null,
            "city_id": null,
            "city_name": null,
            "zipcode": null,
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
            "last_latitude": null,
            "last_longitude": null,
            "industry_id": null,
            "active": 0,
            "device_token": null,
            "wallet_balance": 0,
            "stripe_customer_id": null,
            "terms_and_condiction_1": "0",
            "terms_and_condiction_2": "0",
            "terms_and_condiction_3": "0",
            "created_at": "2022-03-01T07:05:57.000000Z",
            "updated_at": "2022-03-01T07:05:57.000000Z",
            "stripe_id": null,
            "pm_type": null,
            "pm_last_four": null,
            "trial_ends_at": null,
            "full_name": "Columbus Medhurst",
            "role_name": "HOSPITAL",
            "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Columbus&color=7F9CF5&background=EBF4FF"
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-hospital-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-hospital-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-hospital-list"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-hospital-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-hospital-list"></code></pre>
</div>
<form id="form-GETapi-nurse-hospital-list" data-method="GET" data-path="api/nurse/hospital-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-hospital-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-hospital-list" onclick="tryItOut('GETapi-nurse-hospital-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-hospital-list" onclick="cancelTryOut('GETapi-nurse-hospital-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-hospital-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/hospital-list</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-hospital-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-hospital-list" data-component="header"></label>
</p>
</form>


## api/nurse/job-list/{hospital_id?}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/job-list/repellat"
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
    "message": "",
    "data": [
        {
            "id": 11,
            "nurse_id": null,
            "hospital_id": 5,
            "additional_instructions": null,
            "hospital_name": "abc hospital",
            "employee_required": "1",
            "licence_type": 1,
            "skills": "nursing",
            "shifting_timings": null,
            "hiring_budget": "30000",
            "hospital_phone": "9876543210",
            "experience": "1 year",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": null,
            "hospital_state_id": null,
            "hospital_city_id": null,
            "hospital_zipcode": "700001",
            "job_post_date": null,
            "promo_code": null,
            "discount_amount": 0,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 0,
            "nurse_status": null,
            "job_status": 1,
            "terms_and_conditions": 1,
            "payment_status": 2,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 0,
            "created_at": "2022-03-24T06:50:29.000000Z",
            "updated_at": "2022-03-24T07:01:01.000000Z",
            "apply": false,
            "job_shifting": [
                {
                    "id": 1,
                    "job_id": 11,
                    "shifting_time": "10:00AM - 03:00PM",
                    "start_time": "10:00:00",
                    "end_time": "15:00:00",
                    "status": null,
                    "created_at": "2022-03-24T06:50:29.000000Z",
                    "updated_at": "2022-03-24T06:50:29.000000Z"
                },
                {
                    "id": 2,
                    "job_id": 11,
                    "shifting_time": "11:00AM - 04:00PM",
                    "start_time": "11:00:00",
                    "end_time": "16:00:00",
                    "status": null,
                    "created_at": "2022-03-24T06:50:29.000000Z",
                    "updated_at": "2022-03-24T06:50:29.000000Z"
                }
            ]
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-job-list--hospital_id--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-job-list--hospital_id--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-job-list--hospital_id--"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-job-list--hospital_id--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-job-list--hospital_id--"></code></pre>
</div>
<form id="form-GETapi-nurse-job-list--hospital_id--" data-method="GET" data-path="api/nurse/job-list/{hospital_id?}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-job-list--hospital_id--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-job-list--hospital_id--" onclick="tryItOut('GETapi-nurse-job-list--hospital_id--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-job-list--hospital_id--" onclick="cancelTryOut('GETapi-nurse-job-list--hospital_id--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-job-list--hospital_id--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/job-list/{hospital_id?}</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-job-list--hospital_id--" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-job-list--hospital_id--" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>hospital_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="hospital_id" data-endpoint="GETapi-nurse-job-list--hospital_id--" data-component="url"  hidden>
<br>

</p>
</form>


## api/nurse/apply-job

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/apply-job"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "job_id": "1",
    "shifting_id": "1"
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
    "message": "Your application successfully submitted.",
    "data": []
}
```
<div id="execution-results-POSTapi-nurse-apply-job" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-apply-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-apply-job"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-apply-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-apply-job"></code></pre>
</div>
<form id="form-POSTapi-nurse-apply-job" data-method="POST" data-path="api/nurse/apply-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-apply-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-apply-job" onclick="tryItOut('POSTapi-nurse-apply-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-apply-job" onclick="cancelTryOut('POSTapi-nurse-apply-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-apply-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/apply-job</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-apply-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-apply-job" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="job_id" data-endpoint="POSTapi-nurse-apply-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>shifting_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shifting_id" data-endpoint="POSTapi-nurse-apply-job" data-component="body" required  hidden>
<br>

</p>

</form>


## api/nurse/job-confirmation

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/job-confirmation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "comment": "test comment",
    "license": "id",
    "application_id": "1"
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
    "message": "Successfully confirmed.",
    "data": {
        "id": 1,
        "user_id": 5,
        "job_id": 1,
        "comment": "job comfirm",
        "license": "1646638964-4443.png",
        "status": null,
        "created_at": "2022-03-02T14:15:34.000000Z",
        "updated_at": "2022-03-07T07:42:44.000000Z",
        "license_path": "http:\/\/127.0.0.1:8000\/storage\/license\/1646638964-4443.png"
    }
}
```
<div id="execution-results-POSTapi-nurse-job-confirmation" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-job-confirmation"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-job-confirmation"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-job-confirmation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-job-confirmation"></code></pre>
</div>
<form id="form-POSTapi-nurse-job-confirmation" data-method="POST" data-path="api/nurse/job-confirmation" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-job-confirmation', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-job-confirmation" onclick="tryItOut('POSTapi-nurse-job-confirmation');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-job-confirmation" onclick="cancelTryOut('POSTapi-nurse-job-confirmation');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-job-confirmation" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/job-confirmation</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-job-confirmation" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-job-confirmation" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>comment</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="comment" data-endpoint="POSTapi-nurse-job-confirmation" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>license</code></b>&nbsp;&nbsp;<small>image</small>  &nbsp;
<input type="text" name="license" data-endpoint="POSTapi-nurse-job-confirmation" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>application_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="application_id" data-endpoint="POSTapi-nurse-job-confirmation" data-component="body" required  hidden>
<br>

</p>

</form>


## Active Job

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/active-job"
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
    "message": "Your active jobs",
    "data": [
        {
            "id": 2,
            "user_id": 7,
            "job_id": 1,
            "comment": null,
            "license": null,
            "status": 1,
            "approve_time": null,
            "created_at": "2022-03-22T06:51:00.000000Z",
            "updated_at": "2022-03-04T11:08:16.000000Z",
            "license_path": "",
            "job": {
                "id": 1,
                "nurse_id": null,
                "hospital_id": 5,
                "additional_instructions": null,
                "hospital_name": "abc hospital",
                "employee_required": "10",
                "licence_type": 1,
                "skills": "nursing",
                "shifting_timings": "day",
                "hiring_budget": "30000",
                "hospital_phone": "9876543210",
                "experience": "1 year",
                "urgent_requirement": 1,
                "hospital_location": "kolkata",
                "hospital_latitude": null,
                "hospital_longitude": null,
                "hospital_country_id": null,
                "hospital_state_id": null,
                "hospital_city_id": null,
                "hospital_zipcode": "700001",
                "job_post_date": null,
                "promo_code": null,
                "discount_amount": 0,
                "reward_discount_amount": 0,
                "cancellation_charge": 0,
                "total_amount": 0,
                "nurse_status": null,
                "job_status": 1,
                "terms_and_conditions": 1,
                "payment_status": 2,
                "cancelled_by": null,
                "cancellation_reason": null,
                "cancellation_comment": null,
                "cancelled_at": null,
                "active": 0,
                "created_at": "2022-02-17T12:11:40.000000Z",
                "updated_at": "2022-03-07T14:40:11.000000Z",
                "job_shifting": [
                    {
                        "id": 1,
                        "job_id": 1,
                        "shifting_time": "10:00AM - 03:00PM",
                        "start_time": "10:00:00",
                        "end_time": "15:00:00",
                        "status": null,
                        "created_at": "2022-03-24T06:50:29.000000Z",
                        "updated_at": "2022-03-24T06:50:29.000000Z"
                    },
                    {
                        "id": 2,
                        "job_id": 1,
                        "shifting_time": "11:00AM - 04:00PM",
                        "start_time": "11:00:00",
                        "end_time": "16:00:00",
                        "status": null,
                        "created_at": "2022-03-24T06:50:29.000000Z",
                        "updated_at": "2022-03-24T06:50:29.000000Z"
                    }
                ]
            }
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-active-job" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-active-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-active-job"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-active-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-active-job"></code></pre>
</div>
<form id="form-GETapi-nurse-active-job" data-method="GET" data-path="api/nurse/active-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-active-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-active-job" onclick="tryItOut('GETapi-nurse-active-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-active-job" onclick="cancelTryOut('GETapi-nurse-active-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-active-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/active-job</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-active-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-active-job" data-component="header"></label>
</p>
</form>


## Recent posted job

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/recent-posted-job"
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
    "message": "Recent posted job",
    "data": [
        {
            "id": 1,
            "nurse_id": null,
            "hospital_id": 2,
            "additional_instructions": null,
            "hospital_name": "test",
            "employee_required": "1",
            "licence_type": 1,
            "skills": "1",
            "shifting_timings": "1",
            "hiring_budget": "1",
            "hospital_phone": "123456789",
            "experience": "1",
            "urgent_requirement": 1,
            "hospital_location": "1",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": null,
            "hospital_state_id": null,
            "hospital_city_id": null,
            "hospital_zipcode": "12345",
            "job_post_date": null,
            "promo_code": null,
            "discount_amount": 0,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 0,
            "nurse_status": null,
            "job_status": 1,
            "terms_and_conditions": 1,
            "payment_status": 1,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 0,
            "created_at": "2022-03-21T13:09:30.000000Z",
            "updated_at": "2022-03-21T13:09:30.000000Z",
            "hospital": {
                "id": 2,
                "first_name": "hospital",
                "last_name": "user",
                "company_name": null,
                "email": "user@gmail.com",
                "username": "user",
                "phone": "12345678",
                "address": null,
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": null,
                "experience_id": null,
                "language_id": null,
                "skill_id": null,
                "cover_photo_path": null,
                "refer_code": null,
                "referrer_id": null,
                "country_id": null,
                "country_name": null,
                "state_id": null,
                "state_name": null,
                "city_id": null,
                "city_name": null,
                "zipcode": null,
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
                "licence_type": null,
                "otp": null,
                "otp_verified_at": null,
                "is_online": 0,
                "is_online_approve": 0,
                "is_enable_location": 0,
                "is_free": 1,
                "last_latitude": null,
                "last_longitude": null,
                "industry_id": null,
                "active": 0,
                "device_token": null,
                "wallet_balance": 0,
                "stripe_customer_id": null,
                "terms_and_condiction_1": "0",
                "terms_and_condiction_2": "0",
                "terms_and_condiction_3": "0",
                "created_at": "2022-03-21T13:03:54.000000Z",
                "updated_at": "2022-03-21T13:03:54.000000Z",
                "stripe_id": null,
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "full_name": "hospital user",
                "role_name": "HOSPITAL",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=hospital&color=7F9CF5&background=EBF4FF",
                "cover_photo_url": "",
                "resume_url": ""
            },
            "nursetype": {
                "id": 1,
                "type_name": "CAN",
                "active": 1,
                "created_at": null,
                "updated_at": null
            },
            "job_application": [
                {
                    "id": 1,
                    "user_id": 3,
                    "job_id": 1,
                    "comment": null,
                    "license": null,
                    "status": null,
                    "is_applied": 1,
                    "created_at": "2022-03-21T13:10:14.000000Z",
                    "updated_at": "2022-03-21T13:10:14.000000Z",
                    "license_path": ""
                }
            ]
        }
    ],
    "job": null
}
```
<div id="execution-results-GETapi-nurse-recent-posted-job" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-recent-posted-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-recent-posted-job"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-recent-posted-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-recent-posted-job"></code></pre>
</div>
<form id="form-GETapi-nurse-recent-posted-job" data-method="GET" data-path="api/nurse/recent-posted-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-recent-posted-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-recent-posted-job" onclick="tryItOut('GETapi-nurse-recent-posted-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-recent-posted-job" onclick="cancelTryOut('GETapi-nurse-recent-posted-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-recent-posted-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/recent-posted-job</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-recent-posted-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-recent-posted-job" data-component="header"></label>
</p>
</form>


## Complete Job

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/complete-job"
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
"message": "Your active jobs",
"data": [
{
"id": 1,
"user_id": 2,
"job_id": 1,
"comment": test comment,
"license": samplelicense.pdf,
"status": 1,
"created_at": "2022-03-09T13:26:19.000000Z",
"updated_at": "2022-03-09T13:26:19.000000Z",
"license_path": "",
"job": {
"id": 1,
"nurse_id": 2,
"hospital_id": 3,
"additional_instructions": "asdasd",
"hospital_name": "hospital one",
"employee_required": "3",
"licence_type": 2,
"skills": "adasd,sdfsdf",
"shifting_timings": null,
"hiring_budget": "4555",
"hospital_phone": "4567890876",
"experience": "4",
"urgent_requirement": 1,
"hospital_location": "kolkata",
"hospital_latitude": null,
"hospital_longitude": null,
"hospital_country_id": 16,
"hospital_state_id": 19,
"hospital_city_id": 1,
"hospital_zipcode": "700035",
"job_post_date": "2022-03-09 13:24:00",
"promo_code": "45",
"discount_amount": 45,
"reward_discount_amount": 0,
"cancellation_charge": 0,
"total_amount": 5000,
"nurse_status": null,
"job_status": 1,
"terms_and_conditions": null,
"payment_status": 1,
"cancelled_by": null,
"cancellation_reason": null,
"cancellation_comment": null,
"cancelled_at": null,
"active": 1,
"created_at": "2022-03-09T13:24:00.000000Z",
"updated_at": "2022-03-09T13:24:00.000000Z"
}
}
]
}
```
<div id="execution-results-GETapi-nurse-complete-job" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-complete-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-complete-job"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-complete-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-complete-job"></code></pre>
</div>
<form id="form-GETapi-nurse-complete-job" data-method="GET" data-path="api/nurse/complete-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-complete-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-complete-job" onclick="tryItOut('GETapi-nurse-complete-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-complete-job" onclick="cancelTryOut('GETapi-nurse-complete-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-complete-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/complete-job</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-complete-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-complete-job" data-component="header"></label>
</p>
</form>


## api/nurse/application-details/{id}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/application-details/placeat"
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
    "message": "",
    "data": {
        "id": 1,
        "user_id": 5,
        "job_id": 1,
        "comment": "job comfirm",
        "license": "1646638964-4443.png",
        "status": null,
        "created_at": "2022-03-02T14:15:34.000000Z",
        "updated_at": "2022-03-07T07:42:44.000000Z",
        "license_path": "http:\/\/127.0.0.1:8000\/storage\/license\/1646638964-4443.png",
        "job": {
            "id": 1,
            "nurse_id": null,
            "hospital_id": 5,
            "additional_instructions": null,
            "hospital_name": "abc hospital",
            "employee_required": "10",
            "licence_type": 1,
            "skills": "nursing",
            "shifting_timings": "day",
            "hiring_budget": "30000",
            "hospital_phone": "9876543210",
            "experience": "1 year",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": null,
            "hospital_state_id": null,
            "hospital_city_id": null,
            "hospital_zipcode": "700001",
            "job_post_date": null,
            "promo_code": null,
            "discount_amount": 0,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 0,
            "nurse_status": null,
            "job_status": 1,
            "terms_and_conditions": 1,
            "payment_status": 2,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 0,
            "created_at": "2022-02-17T12:11:40.000000Z",
            "updated_at": "2022-03-07T14:40:11.000000Z",
            "hospital": {
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
                "last_latitude": "22.89002",
                "last_longitude": "88.20123",
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
    }
}
```
<div id="execution-results-GETapi-nurse-application-details--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-application-details--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-application-details--id-"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-application-details--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-application-details--id-"></code></pre>
</div>
<form id="form-GETapi-nurse-application-details--id-" data-method="GET" data-path="api/nurse/application-details/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-application-details--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-application-details--id-" onclick="tryItOut('GETapi-nurse-application-details--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-application-details--id-" onclick="cancelTryOut('GETapi-nurse-application-details--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-application-details--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/application-details/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-application-details--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-application-details--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-nurse-application-details--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/nurse/nearest-hospital

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/nearest-hospital"
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
    "message": "",
    "data": [
        {
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
            "last_latitude": "22.565571",
            "last_longitude": "88.370209",
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
            "distance": 0,
            "full_name": "test hospital",
            "role_name": "HOSPITAL",
            "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test&color=7F9CF5&background=EBF4FF"
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-nearest-hospital" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-nearest-hospital"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-nearest-hospital"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-nearest-hospital" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-nearest-hospital"></code></pre>
</div>
<form id="form-GETapi-nurse-nearest-hospital" data-method="GET" data-path="api/nurse/nearest-hospital" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-nearest-hospital', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-nearest-hospital" onclick="tryItOut('GETapi-nurse-nearest-hospital');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-nearest-hospital" onclick="cancelTryOut('GETapi-nurse-nearest-hospital');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-nearest-hospital" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/nearest-hospital</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-nearest-hospital" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-nearest-hospital" data-component="header"></label>
</p>
</form>


## Upcoming Jobs

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/upcoming-job"
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
    "message": "Upcoming job",
    "data": [
        {
            "id": 3,
            "nurse_id": null,
            "hospital_id": 3,
            "additional_instructions": "asdasd",
            "hospital_name": "hospital three",
            "employee_required": "3",
            "licence_type": 2,
            "skills": "adasd,sdfsdf",
            "shifting_timings": null,
            "hiring_budget": "4555",
            "hospital_phone": "4567890876",
            "experience": "4",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": 16,
            "hospital_state_id": 19,
            "hospital_city_id": 1,
            "hospital_zipcode": "700035",
            "job_post_date": "2022-03-09 13:24:00",
            "promo_code": "45",
            "discount_amount": 45,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 5000,
            "nurse_status": null,
            "job_status": 2,
            "terms_and_conditions": null,
            "payment_status": 1,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 1,
            "created_at": "2022-03-09T13:24:00.000000Z",
            "updated_at": "2022-03-09T13:24:00.000000Z",
            "hospital": {
                "id": 3,
                "first_name": "new",
                "last_name": "hosital",
                "company_name": null,
                "email": "new@yopmail.com",
                "username": null,
                "phone": "6756453423",
                "address": "<p>qweqweqweqwe<\/p>\n",
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": "photos\/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg",
                "refer_code": null,
                "referrer_id": null,
                "country_id": 29,
                "state_id": 19,
                "state_name": null,
                "city_id": 1,
                "city_name": null,
                "zipcode": null,
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
                "licence_type": null,
                "otp": null,
                "otp_verified_at": null,
                "is_online": 0,
                "is_online_approve": 0,
                "is_enable_location": 0,
                "is_free": 1,
                "last_latitude": null,
                "last_longitude": null,
                "industry_id": null,
                "active": 1,
                "device_token": null,
                "wallet_balance": 0,
                "stripe_customer_id": null,
                "terms_and_condiction_1": "0",
                "terms_and_condiction_2": "0",
                "terms_and_condiction_3": "0",
                "created_at": "2022-03-09T13:22:19.000000Z",
                "updated_at": "2022-03-09T13:22:19.000000Z",
                "stripe_id": null,
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "experience_id": null,
                "cover_photo_path": null,
                "full_name": "new hosital",
                "role_name": "HOSPITAL",
                "profile_photo_url": "http:\/\/localhost\/storage\/photos\/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg"
            }
        },
        {
            "id": 2,
            "nurse_id": null,
            "hospital_id": 3,
            "additional_instructions": "asdasd",
            "hospital_name": "hospital two",
            "employee_required": "3",
            "licence_type": 2,
            "skills": "adasd,sdfsdf",
            "shifting_timings": null,
            "hiring_budget": "4555",
            "hospital_phone": "4567890876",
            "experience": "4",
            "urgent_requirement": 1,
            "hospital_location": "kolkata",
            "hospital_latitude": null,
            "hospital_longitude": null,
            "hospital_country_id": 16,
            "hospital_state_id": 19,
            "hospital_city_id": 1,
            "hospital_zipcode": "700035",
            "job_post_date": "2022-03-09 13:24:00",
            "promo_code": "45",
            "discount_amount": 45,
            "reward_discount_amount": 0,
            "cancellation_charge": 0,
            "total_amount": 5000,
            "nurse_status": null,
            "job_status": 2,
            "terms_and_conditions": null,
            "payment_status": 1,
            "cancelled_by": null,
            "cancellation_reason": null,
            "cancellation_comment": null,
            "cancelled_at": null,
            "active": 1,
            "created_at": "2022-03-09T13:24:00.000000Z",
            "updated_at": "2022-03-09T13:24:00.000000Z",
            "hospital": {
                "id": 3,
                "first_name": "new",
                "last_name": "hosital",
                "company_name": null,
                "email": "new@yopmail.com",
                "username": null,
                "phone": "6756453423",
                "address": "<p>qweqweqweqwe<\/p>\n",
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": "photos\/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg",
                "refer_code": null,
                "referrer_id": null,
                "country_id": 29,
                "state_id": 19,
                "state_name": null,
                "city_id": 1,
                "city_name": null,
                "zipcode": null,
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
                "licence_type": null,
                "otp": null,
                "otp_verified_at": null,
                "is_online": 0,
                "is_online_approve": 0,
                "is_enable_location": 0,
                "is_free": 1,
                "last_latitude": null,
                "last_longitude": null,
                "industry_id": null,
                "active": 1,
                "device_token": null,
                "wallet_balance": 0,
                "stripe_customer_id": null,
                "terms_and_condiction_1": "0",
                "terms_and_condiction_2": "0",
                "terms_and_condiction_3": "0",
                "created_at": "2022-03-09T13:22:19.000000Z",
                "updated_at": "2022-03-09T13:22:19.000000Z",
                "stripe_id": null,
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "experience_id": null,
                "cover_photo_path": null,
                "full_name": "new hosital",
                "role_name": "HOSPITAL",
                "profile_photo_url": "http:\/\/localhost\/storage\/photos\/lfytMQKAbRA7n46KIffKbJaq4qgUGRDCsXIb2Uu8.jpg"
            }
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-upcoming-job" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-upcoming-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-upcoming-job"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-upcoming-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-upcoming-job"></code></pre>
</div>
<form id="form-GETapi-nurse-upcoming-job" data-method="GET" data-path="api/nurse/upcoming-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-upcoming-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-upcoming-job" onclick="tryItOut('GETapi-nurse-upcoming-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-upcoming-job" onclick="cancelTryOut('GETapi-nurse-upcoming-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-upcoming-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/upcoming-job</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-upcoming-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-upcoming-job" data-component="header"></label>
</p>
</form>


## Nurse skill list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/skill-list"
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
    "message": "Your skill list",
    "data": [
        {
            "id": 1,
            "skill_id": 1,
            "skill_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T11:19:37.000000Z",
            "updated_at": "2022-03-10T11:19:37.000000Z",
            "skills": {
                "id": 1,
                "skill_name": "Test1",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        },
        {
            "id": 2,
            "skill_id": 2,
            "skill_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T11:19:37.000000Z",
            "updated_at": "2022-03-10T11:19:37.000000Z",
            "skills": {
                "id": 2,
                "skill_name": "Test2",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-skill-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-skill-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-skill-list"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-skill-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-skill-list"></code></pre>
</div>
<form id="form-GETapi-nurse-skill-list" data-method="GET" data-path="api/nurse/skill-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-skill-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-skill-list" onclick="tryItOut('GETapi-nurse-skill-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-skill-list" onclick="cancelTryOut('GETapi-nurse-skill-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-skill-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/skill-list</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-skill-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-skill-list" data-component="header"></label>
</p>
</form>


## Nurse&#039;s skill add




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/skill-add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "skill_id": "est"
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
    "message": "Skill added successfully"
}
```
<div id="execution-results-POSTapi-nurse-skill-add" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-skill-add"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-skill-add"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-skill-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-skill-add"></code></pre>
</div>
<form id="form-POSTapi-nurse-skill-add" data-method="POST" data-path="api/nurse/skill-add" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-skill-add', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-skill-add" onclick="tryItOut('POSTapi-nurse-skill-add');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-skill-add" onclick="cancelTryOut('POSTapi-nurse-skill-add');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-skill-add" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/skill-add</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>skill_id</code></b>&nbsp;&nbsp;<small>array</small>  &nbsp;
<input type="text" name="skill_id" data-endpoint="POSTapi-nurse-skill-add" data-component="body" required  hidden>
<br>

</p>

</form>


## Nurse language list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/language-list"
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
    "message": "Your language list",
    "data": [
        {
            "id": 1,
            "language_id": 1,
            "language_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T13:21:57.000000Z",
            "updated_at": "2022-03-10T13:21:57.000000Z",
            "languages": {
                "id": 1,
                "language_name": "English",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        },
        {
            "id": 2,
            "language_id": 2,
            "language_name": "",
            "user_id": 2,
            "created_at": "2022-03-10T13:21:57.000000Z",
            "updated_at": "2022-03-10T13:21:57.000000Z",
            "languages": {
                "id": 2,
                "language_name": "German",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-language-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-language-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-language-list"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-language-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-language-list"></code></pre>
</div>
<form id="form-GETapi-nurse-language-list" data-method="GET" data-path="api/nurse/language-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-language-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-language-list" onclick="tryItOut('GETapi-nurse-language-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-language-list" onclick="cancelTryOut('GETapi-nurse-language-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-language-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/language-list</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-language-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-language-list" data-component="header"></label>
</p>
</form>


## Nurse&#039;s language add

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/language-add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "language_id": "rerum"
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
    "message": "Language added successfully"
}
```
<div id="execution-results-POSTapi-nurse-language-add" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-language-add"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-language-add"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-language-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-language-add"></code></pre>
</div>
<form id="form-POSTapi-nurse-language-add" data-method="POST" data-path="api/nurse/language-add" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-language-add', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-language-add" onclick="tryItOut('POSTapi-nurse-language-add');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-language-add" onclick="cancelTryOut('POSTapi-nurse-language-add');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-language-add" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/language-add</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-language-add" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-language-add" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>language_id</code></b>&nbsp;&nbsp;<small>array</small>  &nbsp;
<input type="text" name="language_id" data-endpoint="POSTapi-nurse-language-add" data-component="body" required  hidden>
<br>

</p>

</form>


## Nurse&#039;s start job

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/start-job"
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
    "message": "Language added successfully"
}
```
<div id="execution-results-POSTapi-nurse-start-job" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-start-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-start-job"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-start-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-start-job"></code></pre>
</div>
<form id="form-POSTapi-nurse-start-job" data-method="POST" data-path="api/nurse/start-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-start-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-start-job" onclick="tryItOut('POSTapi-nurse-start-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-start-job" onclick="cancelTryOut('POSTapi-nurse-start-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-start-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/start-job</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-start-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-start-job" data-component="header"></label>
</p>
</form>


## Nurse&#039;s end job

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/end-job"
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
    "message": "Language added successfully"
}
```
<div id="execution-results-POSTapi-nurse-end-job" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-end-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-end-job"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-end-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-end-job"></code></pre>
</div>
<form id="form-POSTapi-nurse-end-job" data-method="POST" data-path="api/nurse/end-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-end-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-end-job" onclick="tryItOut('POSTapi-nurse-end-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-end-job" onclick="cancelTryOut('POSTapi-nurse-end-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-end-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/end-job</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-end-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-end-job" data-component="header"></label>
</p>
</form>



