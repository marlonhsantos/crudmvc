<?php
set_time_limit(300);
exec('composer update'); // executa e atualiza as dependências
exec(__DIR__. '/vendor/bin/phinx migrate'); // cria as tabelas do banco de dados
exec(__DIR__. '/vendor/bin/phinx seed:run'); // preenche a tabela com valores para teste
header('Location:./');