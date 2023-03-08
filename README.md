<!DOCTYPE html>
<html>
<head>
	<title>Fruits Test Task with Laravel</title>
</head>
<body>
	<h1>Fruits Test Task with Laravel</h1>
php
Copy code
<h2>Requirements</h2>
<ul>
	<li>PHP 7.4 or later</li>
	<li>Composer</li>
	<li>MySQL</li>
</ul>

<h2>Installation</h2>
<ol>
	<li>Clone the repository:<br>
		<code>git clone https://github.com/sweetdream0530/FruitApp</code></li>
	<li>Install the dependencies:<br>
		<code>cd fruit-app<br>
		composer install</code></li>
	<li>Copy the <code>.env.example</code> file and rename it to <code>.env</code>:<br>
		<code>cp .env.example .env</code></li>
	<li>Generate an application key:<br>
		<code>php artisan key:generate</code></li>
	<li>Set up the database by modifying the following lines in the <code>.env</code> file:<br>
		<pre>
                DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=fruitapp
		DB_USERNAME=root
		DB_PASSWORD=</pre></li>
	<li>Run the database migrations:<br>
		<code>php artisan migrate</code></li>
	<li>Serve the application:<br>
		<code>php artisan serve</code></li>
	<li>Open the application in your web browser at <code>http://localhost:8000</code>.</li>
</ol>

<h2>Startup Instructions</h2>
<p>To start the application, open a terminal in the project root directory and run the following command:</p>
<pre>php artisan serve</pre>
<p>This will start the Laravel development server, which can be accessed in a web browser at <code>http://localhost:8000</code>.</p>

<h2>Usage</h2>
<p>The application has several features:</p>
<ul>
	<li>Fetching fruits from the API and saving them to the database using the console command <code>php artisan get:fruits</code>.</li>
	<li>Sending an email notification to a dummy admin email address whenever a new fruit is added.</li>
	<li>Viewing all fruits in a paginated list, with the ability to filter by name and family.</li>
	<li>Adding fruits to a favorites list, with a limit of 10 fruits per user.</li>
	<li>Viewing the favorite fruits list, with the ability to see the sum of nutrition facts for all fruits.</li>
</ul>

<h2>Unit Testing</h2>
<p>The application has unit tests for the Fruit model and the controller methods. To run the tests, open a terminal in the project root directory and run the following command:</p>
<pre>php artisan test</pre>
</body>
</html>