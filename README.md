
<h1>Flash Sale Laravel Project</h1>
<h3> Follow the steps to run the project</h3>
<ol>
    <li>Clone the repo in your machine.</li>
    <li>Then move to project folder and open terminal there.</li>
    <li>Run this command in terminal: <strong>composer install</strong> . This command will install all the dependencies of the project.</li>
    <li>Now create a DB with name <strong>shop</strong> or something else.</li>
    <li>Then create <strong>.env </strong> file where need to define DB name and host.</li>
    <li>After setting <strong>.env</strong> file, run migration command as :
    <br/>
    <strong>php artisan migrate</strong>
    <br/>
    This will create DB schema
    </li>
    <li>Now use the DB seeder command to creat random users:
    <br/>
    <strong>php artisan db:seed</strong>
    </li>    
</ol>

<h4>All these steps will setup the project in local machine.</h4>
<p>To run project , run the below command:</p>
<h3>php artisan serve</h3>

<br/>
<p>Project will run on <strong>http://127.0.0.1:8000</strong></p>

<h2>Admin Section</h2>
<p>To add deals on website, rrun the below url:</p>

<h4>http://127.0.0.1:8000/admin/dashboard</h4>
<p>an Admin dashboard will open. Now you will see a Navigation bar on top from where you can Add the Flash Sale and get the List of all the sales.
<br />
<p>To add flash sale, this url will be used:</p>
<h4>http://127.0.0.1:8000/admin/flash-sale/create</h4>

<br />
<p>To get list of all flash sales, this url will be used:</p>
<h4>http://127.0.0.1:8000/admin/flash-sale</h4>

<br /><br />
<h2>Website</h2>
<p>Use the USER IDs from rnage 1 to 10 in url to see today's deal as:</p>
<h4>http://127.0.0.1:8000?uid=1</h4>

<p>When Uid id passes in URL parameters, user will able to see the deal on home page</p>
<p>User can buy a one and only quantity of a deal.</p>