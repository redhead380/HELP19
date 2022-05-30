<!DOCTYPE html>
<html lang="pt">
    <head>
		<title>Agendamento</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./assets/css/base/base.css">
		<link rel="stylesheet" href="./assets/css/agendamento.css">
		<link rel="stylesheet" href="./assets/css/componentes/concluido.css">
		<link rel="stylesheet" href="./assets/css/componentes/inputs.css">
		<link rel="stylesheet" href="./assets/css/componentes/botao.css">
		<link rel="stylesheet" href="./assets/css/componentes/huicalendar.css" />
	</head>

<body class="subpage">
    <!-- Header -->
    <header id="header">
        <div class="inner">
            <a href="index.html" class="logo"><strong>HELP19</strong></a>
            <nav id="nav">
                <a href="index.html">Home</a>
                <a href="agendamentos.html">Agendamentos</a>
                <a href="generic.html">Sobre nós</a>
                <a href="elements.html">Contato/serviços</a>
            </nav>
            <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        </div>
    </header>

        <div class="container2">
        <section id="three" class="wrapper">
            <h2>Agendamento realizado com sucesso!</h2>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "agendamento";
            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $prot = $_POST["prot"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $nascimento = $_POST["nascimento"];
            $cpf = $_POST["cpf"];
            $cep = $_POST["cep"];
            $logradouro = $_POST["logradouro"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $data_agendamento = $_POST["data_agendamento"];
            $horario_agendamento = $_POST["horario_agendamento"];
            $local_agendamento = $_POST["local_agendamento"];
            //monta sql para o banco de dados ,
            $sql = "INSERT INTO agenda (protocolo, nome, email, data_nascimento, cpf, cep, logradouro, cidade, estado, data_agendamento, horario_agendamento, local_agendamento) VALUES ('" . $prot . "','" . $nome . "','" . $email . "','" . $nascimento . "','" . $cpf . "','" . $cep . "','" . $logradouro . "','" . $cidade . "','" . $estado . "','" . $data_agendamento . "','" . $horario_agendamento . "','" . $local_agendamento . "')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();        

            $stmt = $conn->prepare("SELECT protocolo, nome, email, data_nascimento, cpf, cep, logradouro, cidade, estado, data_agendamento, horario_agendamento, local_agendamento FROM agenda where protocolo = " . $prot);
            $stmt->execute();
            $recordSet = $stmt->fetchAll();
            //var_dump($res);
            // listar os dados
            foreach($recordSet as $k=>$v) {
            echo "<br><br>Procolo: " . $v['protocolo'];
            echo "<br><br>Nome: " . $v['nome'];
            echo "<br><br>E-mail; " . $v['email'];
            echo "<br><br>Data de Nascimento: " . $v['data_nascimento'];
            echo "<br><br>CPF: " . $v['cpf'];
            echo "<br><br>CEP: " . $v['cep'];
            echo "<br><br>Logradouro: " . $v['logradouro'];
            echo "<br><br>Cidade: " . $v['cidade'];
            echo "<br><br>Estado: " . $v['estado'];
            echo "<br><br>Data de agendamento: " . $v['data_agendamento'];
            echo "<br><br>Horario de agendamento: " . $v['horario_agendamento'];
            echo "<br><br>Local de agendamento: " . $v['local_agendamento'];
            }
            } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
            }
            $conn = null;
            ?>
            
            <a href="./index.php" class="botao">Página inicial</a>
        </section>
    </div>
    <!-- Scripts -->
        <script src="./assets/js/agendamento.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="./assets/js/jquery-3.6.0.min.js"></script>
        <script src="./assets/js/huicalendar.js"></script>
    
<!-- Footer -->
    <footer id="footer">
        <div class="inner">

            <div class="copyright">
                &copy; Untitled. Design: <a href="https://portal.fmu.br/">FMU</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
            </div>
        </div>
    </footer>	
</body>
</html>
