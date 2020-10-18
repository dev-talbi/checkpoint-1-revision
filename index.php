<?php 
include 'header.php';
include 'function.php';
$bribes = getAll();
$result = getTotal();
//var_dump($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['payement'] && ($_POST['payement']>0))) {
        if(isset($_POST['create'])){
            createArticle($_POST);
        }
       
    }
}
var_dump($data);

?>


<body>


<table border="0">
<tr COLSPAN=2 BGCOLOR="#6D8FFF">
   
   <td>Name</td>
   <td>payement</td>
</tr>
<?php     
foreach ($bribes as $bribe) 
{
   echo "<tr>".
        
        "<td>".$bribe["name"]."</td>".
        "<td>".$bribe["payement"]."</td>".
        "</tr>";
}

?>
<h2><?php foreach ($result as $result) {
    echo "total =". $result["total"];
} ?> </h2>

<!--FORMULAIRE-->
<form action="" method="post">

    <div>
        <label for="name">name :</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="payement">payement :</label>
        <input type="text" id="payement" name="payement" required>
    </div>

<!--BOUTON-->
<button type="submit" name="create" class="btn btn-primary">Create</button>



    
</body>
</html>