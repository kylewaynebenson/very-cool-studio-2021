<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test basic PHP
echo "PHP is working<br>";

// Test autoloading
require __DIR__ . '/kirby/bootstrap.php';
echo "Kirby bootstrap loaded<br>";

// Test Kirby class
try {
    $kirby = new Kirby();
    echo "Kirby instance created<br>";
    
    // Test site configuration
    echo "Site configuration:<br>";
    echo "<pre>";
    print_r($kirby->option());
    echo "</pre>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
} 