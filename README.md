# gerenciar-senhas

Necessário instalação da aplicação minikube e docker em sua máquina.


Realize o git clone desse projeto

# Passo a passo de subir projeto
Navegue até a pasta database do projeto e execute no terminal os comandos abaixo

Docker build . -t emerson27/testebanco:1.0

kubectl apply -f db-deployment.yml

------

Navegue até a pasta backend do projeto e execute no terminal os comandos abaixo:

Docker build . -t emerson27/php2:1.0

kubectl apply -f php-deployment.yml

------
Disponibizar URL para acesso:

minikube service php-service --url

