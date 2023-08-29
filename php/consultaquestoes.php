<?php
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<pre>Inicio da script PHP</pre>';
// echo '<pre>' . var_export($_GET) . '</pre>';

$hostname = "localhost";
$user = "admin";
$password = "ifsp@1234";
$database = "quizif";

$conn = mysqli_connect($hostname, $user, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
echo "Conexão feita com sucesso";

$query = "select * from questoes;";
$results = mysqli_query($conn, $query);
$index = 0;
while ($record = mysqli_fetch_row($results)) {
    $question = array(
        'id' => $record[0],
        'titulo' => $record[1],
        'descricao' => $record[2]
    );
    $questions[$index] = $question;
    $index++;
}

// var_dump($questions);
// $exportedData = var_export($questions, true);
/*
 highlight_string("<?php\n\$data = $exportedData;\n?>");
*/
// foreach ($questions as $key => $value) {
//     // echo "$key: $value <br>";
// }

// Close the connection
mysqli_close($conn);
$formattedData =  json_encode($questions, JSON_PRETTY_PRINT);
echo "<pre>" . $formattedData . "</pre>";

// header("Location: /index.html");
// exit();

?>
