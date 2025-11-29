<?php
$mysqli = new mysqli("localhost", "root", "", "crud");

if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Insere os usuários
$sql_insert = "INSERT INTO usuarios (nome, telefone, email, data_nascimento) VALUES
('ALVARO GABRIEL GOULART RODRIGUES', '47 98888-7777', ' alvaro.gr@aluno.ifsc.edu.br', '2007-05-14'),
('ANA JULIA BERGAMO', '47 95555-3333', 'najuliabergamo0@gmail.com', '2003-11-20'),
('ARTHUR PEREIRA', '47 97777-8888', 'peneir20@gmail.com', '2005-02-01'),
('BIANCA JUNKES RECH', '47 99999-0000', 'bianca.jr2007@gmail.com', '2001-07-10'),
('CAMILA DE ASSUNCAO', '47 97777-6666', 'marcio.brassuncao@gmail.com', '2004-12-30'),
('CLARA BIANCA KISTNER', '47 98888-7777', ' clara.k15@aluno.ifsc.edu.br', '2007-05-14'),
('DANIEL STAMM PESSOA DE OLIVEIRA', '47 95555-3333', 'engenheirodouglaspessoa@gmail.com	', '2003-11-20'),
('DIMITRI SCHMIDT', '47 97777-8888', 'camilaschmidt2006@gmail.com', '2005-02-01'),
('BEMANUEL DE OLIVEIRA FARIAS', '47 99999-0000', 'emanuel.oliveira.farias@gmail.com', '2001-07-10'),
('EMILY SIMAS DE SOUZA', '47 97777-6666', 'julisimas.souza@gmail.com', '2004-12-30'),
('ENZO KIYOSHI ANAMI REIGOZA', '47 98888-7777', 'tyekoanami@gmail.com', '2007-05-14'),
('GABRIEL MENDES MOTTA', '47 95555-3333', 'sgtmotta01@yahoo.com.br', '2003-11-20'),
('GUSTAVO DANIEL DA SILVEIRA ALVES', '47 97777-8888', 'gugadanielalvez@gmail.com', '2005-02-01'),
('GUSTAVO GERMANO FERNANDES', '47 99999-0000', 'gusgermes@gmail.com', '2001-07-10'),
('GUSTAVO GROCELLI ROSA', '47 97777-6666', 'rosaguga07@gmail.com', '2004-12-30'),
('GUSTAVO HEIDEN', '47 98888-7777', 'gustavo.heiden32@gmail.com', '2007-05-14'),
('GUSTAVO KAUTZMANN LEMES DE CAMPOS', '47 95555-3333', ' joares.campos@gmail.com', '2003-11-20'),
('GUSTAVO RIBEIRO GONCALVES BARBOSA', '47 97777-8888', 'gustavorgb4382@gmail.com', '2005-02-01'),
('GUSTAVO THEISS WILBERT', '47 99999-0000', 'gustatw07@gmail.com', '2001-07-10'),
('HENRIQUE CONRADT DOS SANTOS', '47 97777-6666', 'claudiaconradt@gmail.com', '2004-12-30'),

('ISABELLA ULLRICH', '47 97777-8888', 'isabella.ullrich07@gmail.com', '2005-02-01'),
('JOÃO PEDRO PITZ', '47 99999-0000', 'fabiapitz@gmail.com', '2001-07-10'),
('JOSÉ OLÁVIO DA SILVA', '47 97777-6666', 'jose.os2006@aluno.ifsc.edu.br', '2004-12-30'),
('LEONARDO CORTELIM DOS SANTOS', '47 98888-7777', 'leo.cortelim@gmail.com', '2007-05-14'),
('LIA BRORING FONTES SCHRAMM', '47 95555-3333', ' bfsliamoon@gmail.com', '2003-11-20'),
('MAICO DA SILVA CORREA', '47 97777-8888', 'cris_24bnu@hotmail.com', '2005-02-01'),
('MARIA CLARA ADÃO', '47 99999-0000', 'josyadao@hotmail.com', '2001-07-10'),
('NATAN JOÃO VANSUITA', '47 97777-6666', 'natanjoaovansuita@gmail.com', '2004-12-30'),
('SAMUEL HENRIQUE KRAUSS', '47 98888-7777', ' krauss.samuelh@gmail.com', '2007-05-14'),

('SARAH MANUELA DE CARVALHO', '47 95555-3333', 'magridlange@gmail.com', '2003-11-20'),
('VINICIUS NUNES BISPO', '47 97777-8888', 'jt.marmorites@hotmail.com', '2005-02-01'),
('VINICIUS RAFAEL BATISTA', '47 99999-0000', 'vinirafaelbatista@gmail.com', '2001-07-10'),
('VINICIUS STORCH', '47 97777-6666', 'juliusstorchneto@gmail.com', '2004-12-30'),
('VITOR FRANCISCO NICOLETTI DA ROSA', '47 98888-7777', 'andresanicoletti18@gmail.com', '2007-05-14'),
('VITOR HUGO PRANGE', '47 95555-3333', 'daiana.prange@gmail.com', '2003-11-20'),
('YAGO SCHRAMM DE SOUZA', '47 97777-8888', 'yrtoiu1515@gmail.com', '2005-02-01');
";

if($mysqli->query($sql_insert)){
    echo "Usuários inseridos com sucesso!";
} else {
    echo "Erro ao inserir usuários: " . $mysqli->error;
}

$mysqli->close();
?>
