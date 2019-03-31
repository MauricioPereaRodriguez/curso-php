<?php

require_once 'vendor/autoload.php';

use App\Models\Project;
use Illuminate\Database\Capsule\Manager as Capsule;
// Set the event dispatcher used by Eloquent models... (optional)
//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'coursephp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);


//$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

if( !empty($_POST)){
    $project = new Project();
    $project->title = $_POST['title'];
    $project->description = $_POST['description'];
    $project->save();
}

?>
<!doctype html>
<html>
    <head>
        <title>Add Project</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
            crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <h1>Add Project</h1>
            <form action="addProject.php" method="post">
                <label for="title">Title</label>
                <input type="text" name="title" id="tile"><br>
                <label for="description">Description</label>
                <input type="text" name="description" id="description"><br>
                <button type="submit">Save</button>
            </form>
        </div>        
    </body>
</html>