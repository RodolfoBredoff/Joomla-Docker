# Projeto da disciplina de Tecnologias Web

## Site de formatura feito em Joomla usando Docker

O trabalho será hospedado em um conteiner Docker como infraestrututra, 
utilizando uma instância com PHP e MySQL para hospedagem de dados e um servidor Apache

# Roteiro completo do trabalho
[neste link](http://www.sistemas.pucminas.br/sga4/SilverStream/Pages/pgAln_MaterialDidatico.html?seqTurma=9154100&seqTurmaFormatado=9154100&nomTurma=TECNOLOGIAS%20WEB&seqPlano=316044);


## Instruções para execução

##### Clonar o projeto
```
git clone https://github.com/RodolfoBredoff/Joomla-Docker
```

##### entre na pasta do projeto

```
cd joomla-docker
```

##### entre na pasta 'ops'

```
cd ops
```

##### Execute docker-compose
```
docker-compose up -d
```

#### Acesso no navegador pelo localhost
[http://localhost:8080/](http://localhost:8080/)
> 

#**Observação**

Todo comando git deve ser executado dentro da pasta joomla-docker para manter a estrutura correta de funcionamento

#**Opcional**

## Usando docker-compose na AWS
Docker-compose do trabalho da disciplina de Tecnologias Web da Puc Minas
## Docker machine para criação de uma máquina na AWS usando um docker-compose de um CMS Joomla.

Script de comando para criação de uma servidor com Docker na AWS e criação de um site usando CMS Joomla.

### Cria a máquina na instância da AWS usando docker-machine
```
docker-machine create --driver amazonec2 <nome-do-servidor>
```

### Envia o máquina criada para criada para a AWS
```
docker-machine env <nome-do-servidor>
```

### Após o retorno do servidor é só rodar o último comando
```
env $(docker-machine env <nome-do-servidor
```

Após a execução todo comando do docker será executado na máquina criada na AWS

### Envia o docker-compose para o servidor dentro da aws
```
docker-compose up -do
```
shots/1_phpmyadmin_import.jpg "Eecute SQL script")
 
##### Import success
![Success import](https://github.com/rodolfobredoff/tecweb-joomla/blob/master/screenshots/1_phpmyadmin_import.jpg "Success import")

#### Acesso ao site
[http://localhost:8080/](http://localhost:8080/)

#### Acesso ao painel de adminstrador
[http://localhost:8080/administrator/](http://localhost:8080/administrator/)
> login/senha
```
admin/admin
```

#### Acesso ao phpmyadmin
[http://localhost:8000/](http://localhost:8000/)
>  login/senha
```
root/root
```

#**Opcional**

## Usando docker-compose na AWS
Docker-compose do trabalho da disciplina de Tecnologias Web da Puc Minas
## Docker machine para criação de uma máquina na AWS usando um docker-compose de um CMS Joomla.

Script de comando para criação de uma servidor com Docker na AWS e criação de um site usando CMS Joomla.

### Cria a máquina na instância da AWS usando docker-machine
```
docker-machine create --driver amazonec2 <nome-do-servidor>
```

### Envia o máquina criada para criada para a AWS
```
docker-machine env <nome-do-servidor>
```

### Após o retorno do servidor é só rodar o último comando
```
env $(docker-machine env <nome-do-servidor
```

Após a execução todo comando do docker será executado na máquina criada na AWS

### Envia o docker-compose para o servidor dentro da aws
```
docker-compose up -do
```
