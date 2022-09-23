# Hospital Jobs

APIs for managing basic job functionality

## api/hospital/create-job

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/create-job"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "hospital_name": "abc hospital",
    "employee_required": "10",
    "licence_type": "1|2",
    "skills": "nursing",
    "hiring_budget": "30000",
    "hospital_phone": "9876543210",
    "experience": "1 year",
    "urgent_requirement": "1|0",
    "hospital_location": "kolkata",
    "hospital_zipcode": "700001",
    "shifting_timings": "day",
    "terms_and_conditions": "1|0"
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
    "message": "Job successfully added.",
    "data": {
        "job_id": 9,
        "total": "100",
        "taxTotal": 5,
        "subTotal": 105
    }
}
```
<div id="execution-results-POSTapi-hospital-create-job" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-create-job"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-create-job"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-create-job" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-create-job"></code></pre>
</div>
<form id="form-POSTapi-hospital-create-job" data-method="POST" data-path="api/hospital/create-job" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-create-job', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-create-job" onclick="tryItOut('POSTapi-hospital-create-job');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-create-job" onclick="cancelTryOut('POSTapi-hospital-create-job');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-create-job" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/create-job</code></b>
</p>
<p>
<label id="auth-POSTapi-hospital-create-job" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-hospital-create-job" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>hospital_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_name" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>employee_required</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="employee_required" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>licence_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="licence_type" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>skills</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="skills" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hiring_budget</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hiring_budget" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hospital_phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_phone" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>experience</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="experience" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>urgent_requirement</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="urgent_requirement" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hospital_location</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_location" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hospital_zipcode</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_zipcode" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>shifting_timings</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shifting_timings" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>terms_and_conditions</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="terms_and_conditions" data-endpoint="POSTapi-hospital-create-job" data-component="body" required  hidden>
<br>

</p>

</form>


## api/hospital/update-job/{job_id}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/update-job/numquam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "hospital_name": "abc hospital",
    "employee_required": "10",
    "licence_type": "1|2",
    "skills": "nursing",
    "hiring_budget": "30000",
    "hospital_phone": "9876543210",
    "experience": "1 year",
    "urgent_requirement": "1|0",
    "hospital_location": "kolkata",
    "hospital_zipcode": "700001",
    "shifting_timings": "day",
    "terms_and_conditions": "1|0"
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
    "message": "Job successfully updated.",
    "data": {
        "id": 3,
        "nurse_id": null,
        "hospital_id": 5,
        "additional_instructions": null,
        "hospital_name": "xyz hospital",
        "employee_required": "1",
        "licence_type": 1,
        "skills": "nursing",
        "shifting_timings": "day",
        "hiring_budget": "30000",
        "hospital_phone": "9876543210",
        "experience": "1 year",
        "urgent_requirement": "1",
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
        "payment_status": 1,
        "cancelled_by": null,
        "cancellation_reason": null,
        "cancellation_comment": null,
        "cancelled_at": null,
        "active": 0,
        "created_at": "2022-03-04T10:00:42.000000Z",
        "updated_at": "2022-03-04T10:02:08.000000Z"
    }
}
```
<div id="execution-results-POSTapi-hospital-update-job--job_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-update-job--job_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-update-job--job_id-"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-update-job--job_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-update-job--job_id-"></code></pre>
</div>
<form id="form-POSTapi-hospital-update-job--job_id-" data-method="POST" data-path="api/hospital/update-job/{job_id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-update-job--job_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-update-job--job_id-" onclick="tryItOut('POSTapi-hospital-update-job--job_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-update-job--job_id-" onclick="cancelTryOut('POSTapi-hospital-update-job--job_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-update-job--job_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/update-job/{job_id}</code></b>
</p>
<p>
<label id="auth-POSTapi-hospital-update-job--job_id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="job_id" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>hospital_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_name" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>employee_required</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="employee_required" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>licence_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="licence_type" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>skills</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="skills" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hiring_budget</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hiring_budget" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hospital_phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_phone" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>experience</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="experience" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>urgent_requirement</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="urgent_requirement" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hospital_location</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_location" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hospital_zipcode</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hospital_zipcode" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>shifting_timings</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shifting_timings" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>terms_and_conditions</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="terms_and_conditions" data-endpoint="POSTapi-hospital-update-job--job_id-" data-component="body" required  hidden>
<br>

</p>

</form>


## api/hospital/remove-job/{job_id}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/remove-job/temporibus"
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
"message": "Job successfully removed.",
"data": []
```
<div id="execution-results-GETapi-hospital-remove-job--job_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-hospital-remove-job--job_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital-remove-job--job_id-"></code></pre>
</div>
<div id="execution-error-GETapi-hospital-remove-job--job_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital-remove-job--job_id-"></code></pre>
</div>
<form id="form-GETapi-hospital-remove-job--job_id-" data-method="GET" data-path="api/hospital/remove-job/{job_id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital-remove-job--job_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-hospital-remove-job--job_id-" onclick="tryItOut('GETapi-hospital-remove-job--job_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-hospital-remove-job--job_id-" onclick="cancelTryOut('GETapi-hospital-remove-job--job_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-hospital-remove-job--job_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/hospital/remove-job/{job_id}</code></b>
</p>
<p>
<label id="auth-GETapi-hospital-remove-job--job_id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-hospital-remove-job--job_id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="job_id" data-endpoint="GETapi-hospital-remove-job--job_id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/hospital/total-job-list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/total-job-list"
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
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "nurse_id": null,
                "hospital_id": 3,
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
                "created_at": "2022-03-17T12:33:34.000000Z",
                "updated_at": "2022-03-17T12:33:34.000000Z",
                "job_application_count": 0,
                "nursetype": {
                    "id": 1,
                    "type_name": "CAN",
                    "active": 1,
                    "created_at": null,
                    "updated_at": null
                }
            }
        ],
        "first_page_url": "http:\/\/127.0.0.1:8000\/api\/hospital\/total-job-list?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/127.0.0.1:8000\/api\/hospital\/total-job-list?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/127.0.0.1:8000\/api\/hospital\/total-job-list?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http:\/\/127.0.0.1:8000\/api\/hospital\/total-job-list",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```
<div id="execution-results-GETapi-hospital-total-job-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-hospital-total-job-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital-total-job-list"></code></pre>
</div>
<div id="execution-error-GETapi-hospital-total-job-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital-total-job-list"></code></pre>
</div>
<form id="form-GETapi-hospital-total-job-list" data-method="GET" data-path="api/hospital/total-job-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital-total-job-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-hospital-total-job-list" onclick="tryItOut('GETapi-hospital-total-job-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-hospital-total-job-list" onclick="cancelTryOut('GETapi-hospital-total-job-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-hospital-total-job-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/hospital/total-job-list</code></b>
</p>
<p>
<label id="auth-GETapi-hospital-total-job-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-hospital-total-job-list" data-component="header"></label>
</p>
</form>


## api/hospital/recent-job-list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/recent-job-list"
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
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "nurse_id": null,
                "hospital_id": 3,
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
                "created_at": "2022-03-17T12:33:34.000000Z",
                "updated_at": "2022-03-17T12:33:34.000000Z",
                "job_application_count": 0,
                "nursetype": {
                    "id": 1,
                    "type_name": "CAN",
                    "active": 1,
                    "created_at": null,
                    "updated_at": null
                }
            }
        ],
        "first_page_url": "http:\/\/127.0.0.1:8000\/api\/hospital\/recent-job-list?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/127.0.0.1:8000\/api\/hospital\/recent-job-list?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http:\/\/127.0.0.1:8000\/api\/hospital\/recent-job-list?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http:\/\/127.0.0.1:8000\/api\/hospital\/recent-job-list",
        "per_page": 10,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```
<div id="execution-results-GETapi-hospital-recent-job-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-hospital-recent-job-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital-recent-job-list"></code></pre>
</div>
<div id="execution-error-GETapi-hospital-recent-job-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital-recent-job-list"></code></pre>
</div>
<form id="form-GETapi-hospital-recent-job-list" data-method="GET" data-path="api/hospital/recent-job-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital-recent-job-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-hospital-recent-job-list" onclick="tryItOut('GETapi-hospital-recent-job-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-hospital-recent-job-list" onclick="cancelTryOut('GETapi-hospital-recent-job-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-hospital-recent-job-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/hospital/recent-job-list</code></b>
</p>
<p>
<label id="auth-GETapi-hospital-recent-job-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-hospital-recent-job-list" data-component="header"></label>
</p>
</form>


## api/hospital/job-view/{job_id}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/job-view/dolores"
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
        "payment_status": 1,
        "cancelled_by": null,
        "cancellation_reason": null,
        "cancellation_comment": null,
        "cancelled_at": null,
        "active": 0,
        "created_at": "2022-02-17T12:11:40.000000Z",
        "updated_at": "2022-03-03T12:11:40.000000Z",
        "hospital": {
            "id": 5,
            "first_name": "test",
            "last_name": "hospital",
            "email": "dakoqet@vomoto.com",
            "phone": "9876543211",
            "full_name": "test hospital",
            "role_name": "HOSPITAL",
            "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test&color=7F9CF5&background=EBF4FF"
        },
        "job_application": [
            {
                "id": 1,
                "user_id": 5,
                "job_id": 1,
                "status": null,
                "created_at": "2022-03-02T14:15:34.000000Z",
                "updated_at": "2022-03-02T14:15:34.000000Z",
                "nurse": {
                    "id": 5,
                    "first_name": "test",
                    "last_name": "hospital",
                    "email": "dakoqet@vomoto.com",
                    "phone": "9876543211",
                    "experience_year": null,
                    "experience_month": null,
                    "full_name": "test hospital",
                    "role_name": "HOSPITAL",
                    "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test&color=7F9CF5&background=EBF4FF"
                }
            },
            {
                "id": 2,
                "user_id": 7,
                "job_id": 1,
                "status": null,
                "created_at": "2022-03-04T06:51:00.000000Z",
                "updated_at": "2022-03-04T06:51:00.000000Z",
                "nurse": {
                    "id": 7,
                    "first_name": "test nurse",
                    "last_name": null,
                    "email": "tajuzol@tafmail.com",
                    "phone": "9876543212",
                    "experience_year": "3",
                    "experience_month": "7",
                    "full_name": "test nurse ",
                    "role_name": "NURSE",
                    "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test+nurse&color=7F9CF5&background=EBF4FF"
                }
            }
        ]
    }
}
```
<div id="execution-results-GETapi-hospital-job-view--job_id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-hospital-job-view--job_id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital-job-view--job_id-"></code></pre>
</div>
<div id="execution-error-GETapi-hospital-job-view--job_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital-job-view--job_id-"></code></pre>
</div>
<form id="form-GETapi-hospital-job-view--job_id-" data-method="GET" data-path="api/hospital/job-view/{job_id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital-job-view--job_id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-hospital-job-view--job_id-" onclick="tryItOut('GETapi-hospital-job-view--job_id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-hospital-job-view--job_id-" onclick="cancelTryOut('GETapi-hospital-job-view--job_id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-hospital-job-view--job_id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/hospital/job-view/{job_id}</code></b>
</p>
<p>
<label id="auth-GETapi-hospital-job-view--job_id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-hospital-job-view--job_id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="job_id" data-endpoint="GETapi-hospital-job-view--job_id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/hospital/application-details/{id}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/application-details/est"
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
        "user_id": 3,
        "job_id": 1,
        "comment": null,
        "license": null,
        "status": null,
        "is_applied": 1,
        "created_at": "2022-03-21T13:10:14.000000Z",
        "updated_at": "2022-03-21T13:10:14.000000Z",
        "license_path": "",
        "nurse": {
            "id": 3,
            "first_name": "user1",
            "last_name": "nurse",
            "company_name": null,
            "email": "usernurse9@yopmail.com",
            "username": "usernurse9",
            "phone": "1234567891",
            "address": "test",
            "email_verified_at": null,
            "social_id": null,
            "social_account_type": null,
            "profile_photo_path": "1647868174-9074.png",
            "experience_id": null,
            "language_id": null,
            "skill_id": null,
            "cover_photo_path": null,
            "refer_code": null,
            "referrer_id": null,
            "country_id": null,
            "country_name": "test",
            "state_id": null,
            "state_name": null,
            "city_id": null,
            "city_name": "test",
            "zipcode": "12345",
            "experience_year": "1",
            "experience_month": "1",
            "experience": null,
            "gender": null,
            "salary": null,
            "resume_path": null,
            "date_of_birth": null,
            "licence_number": null,
            "lpn": null,
            "can": null,
            "security_question": "test",
            "security_answer": "test",
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
            "terms_and_condiction_1": "1",
            "terms_and_condiction_2": "1",
            "terms_and_condiction_3": "1",
            "created_at": "2022-03-21T13:09:34.000000Z",
            "updated_at": "2022-03-21T13:09:34.000000Z",
            "stripe_id": null,
            "pm_type": null,
            "pm_last_four": null,
            "trial_ends_at": null,
            "full_name": "user1 nurse",
            "role_name": "NURSE",
            "profile_photo_url": "http:\/\/127.0.0.1:8000\/storage\/1647868174-9074.png",
            "cover_photo_url": "",
            "resume_url": "",
            "experience_data": null
        },
        "job": {
            "id": 1,
            "licence_type": 1,
            "nursetype": {
                "id": 1,
                "type_name": "CAN",
                "active": 1,
                "created_at": null,
                "updated_at": null
            }
        }
    }
}
```
<div id="execution-results-GETapi-hospital-application-details--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-hospital-application-details--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital-application-details--id-"></code></pre>
</div>
<div id="execution-error-GETapi-hospital-application-details--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital-application-details--id-"></code></pre>
</div>
<form id="form-GETapi-hospital-application-details--id-" data-method="GET" data-path="api/hospital/application-details/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital-application-details--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-hospital-application-details--id-" onclick="tryItOut('GETapi-hospital-application-details--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-hospital-application-details--id-" onclick="cancelTryOut('GETapi-hospital-application-details--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-hospital-application-details--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/hospital/application-details/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-hospital-application-details--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-hospital-application-details--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-hospital-application-details--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/hospital/application-list/{job_id?}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/application-list/repellendus"
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
            "id": 2,
            "user_id": 7,
            "job_id": 1,
            "comment": null,
            "license": null,
            "status": 1,
            "created_at": "2022-03-22T06:51:00.000000Z",
            "updated_at": "2022-03-04T11:08:16.000000Z",
            "license_path": "",
            "nurse": {
                "id": 7,
                "first_name": "test nurse",
                "last_name": null,
                "company_name": null,
                "email": "tajuzol@tafmail.com",
                "username": "testnurse",
                "phone": "9876543212",
                "address": "kolkata-700001",
                "email_verified_at": null,
                "social_id": null,
                "social_account_type": null,
                "profile_photo_path": "1646287708-3424.jpg",
                "refer_code": null,
                "referrer_id": null,
                "country_id": 1,
                "state_id": null,
                "state_name": null,
                "city_id": 1,
                "city_name": null,
                "zipcode": "700001",
                "experience_year": "3",
                "experience_month": "7",
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
                "created_at": "2022-03-03T06:08:28.000000Z",
                "updated_at": "2022-03-03T06:08:28.000000Z",
                "stripe_id": null,
                "pm_type": null,
                "pm_last_four": null,
                "trial_ends_at": null,
                "full_name": "test nurse ",
                "role_name": "NURSE",
                "profile_photo_url": "http:\/\/localhost\/storage\/1646287708-3424.jpg"
            },
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
                "updated_at": "2022-03-07T14:40:11.000000Z"
            }
        }
    ]
}
```
<div id="execution-results-GETapi-hospital-application-list--job_id--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-hospital-application-list--job_id--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital-application-list--job_id--"></code></pre>
</div>
<div id="execution-error-GETapi-hospital-application-list--job_id--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital-application-list--job_id--"></code></pre>
</div>
<form id="form-GETapi-hospital-application-list--job_id--" data-method="GET" data-path="api/hospital/application-list/{job_id?}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital-application-list--job_id--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-hospital-application-list--job_id--" onclick="tryItOut('GETapi-hospital-application-list--job_id--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-hospital-application-list--job_id--" onclick="cancelTryOut('GETapi-hospital-application-list--job_id--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-hospital-application-list--job_id--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/hospital/application-list/{job_id?}</code></b>
</p>
<p>
<label id="auth-GETapi-hospital-application-list--job_id--" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-hospital-application-list--job_id--" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="job_id" data-endpoint="GETapi-hospital-application-list--job_id--" data-component="url"  hidden>
<br>

</p>
</form>


## api/hospital/application-accept-reject

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/application-accept-reject"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "application_id": "1",
    "status": "0|1|2"
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
    "message": "Successfully Accepted"
}
```
<div id="execution-results-POSTapi-hospital-application-accept-reject" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-application-accept-reject"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-application-accept-reject"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-application-accept-reject" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-application-accept-reject"></code></pre>
</div>
<form id="form-POSTapi-hospital-application-accept-reject" data-method="POST" data-path="api/hospital/application-accept-reject" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-application-accept-reject', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-application-accept-reject" onclick="tryItOut('POSTapi-hospital-application-accept-reject');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-application-accept-reject" onclick="cancelTryOut('POSTapi-hospital-application-accept-reject');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-application-accept-reject" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/application-accept-reject</code></b>
</p>
<p>
<label id="auth-POSTapi-hospital-application-accept-reject" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-hospital-application-accept-reject" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>application_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="application_id" data-endpoint="POSTapi-hospital-application-accept-reject" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="status" data-endpoint="POSTapi-hospital-application-accept-reject" data-component="body" required  hidden>
<br>

</p>

</form>


## api/hospital/job-count-details

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/job-count-details"
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
        "recent_job": 1,
        "total_job": 2,
        "last_application": 1
    }
}
```
<div id="execution-results-GETapi-hospital-job-count-details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-hospital-job-count-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital-job-count-details"></code></pre>
</div>
<div id="execution-error-GETapi-hospital-job-count-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital-job-count-details"></code></pre>
</div>
<form id="form-GETapi-hospital-job-count-details" data-method="GET" data-path="api/hospital/job-count-details" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital-job-count-details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-hospital-job-count-details" onclick="tryItOut('GETapi-hospital-job-count-details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-hospital-job-count-details" onclick="cancelTryOut('GETapi-hospital-job-count-details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-hospital-job-count-details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/hospital/job-count-details</code></b>
</p>
<p>
<label id="auth-GETapi-hospital-job-count-details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-hospital-job-count-details" data-component="header"></label>
</p>
</form>


## api/hospital/payment

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/hospital/payment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "card_no": "4242424242424242",
    "exp_month": "01",
    "exp_year": "2022",
    "cvv": "123",
    "card_full_name": "jhon",
    "total_amount": "200",
    "job_id": "2"
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
    "message": "Payment successful."
}
```
<div id="execution-results-POSTapi-hospital-payment" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-hospital-payment"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital-payment"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital-payment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital-payment"></code></pre>
</div>
<form id="form-POSTapi-hospital-payment" data-method="POST" data-path="api/hospital/payment" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital-payment', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-hospital-payment" onclick="tryItOut('POSTapi-hospital-payment');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-hospital-payment" onclick="cancelTryOut('POSTapi-hospital-payment');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-hospital-payment" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/hospital/payment</code></b>
</p>
<p>
<label id="auth-POSTapi-hospital-payment" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-hospital-payment" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>card_no</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="card_no" data-endpoint="POSTapi-hospital-payment" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>exp_month</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="exp_month" data-endpoint="POSTapi-hospital-payment" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>exp_year</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="exp_year" data-endpoint="POSTapi-hospital-payment" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>cvv</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cvv" data-endpoint="POSTapi-hospital-payment" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>card_full_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="card_full_name" data-endpoint="POSTapi-hospital-payment" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>total_amount</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="total_amount" data-endpoint="POSTapi-hospital-payment" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>job_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="job_id" data-endpoint="POSTapi-hospital-payment" data-component="body" required  hidden>
<br>

</p>

</form>



