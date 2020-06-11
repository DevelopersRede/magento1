# Importante

Utilize sempre a última release para a instalação da versão mais recente do módulo

https://github.com/DevelopersRede/magento1/releases

# Módulo Magento 1.x

Esse módulo é suportado pelas versões 1.7 até 1.9 da plataforma Magento, desde que seguido os requisitos abaixo:

## Requisitos

### Sistema operacional

* Linux x86-64

### Servidor web

Tanto o Apache httpd quanto o Nginx são compatíveis, desde observadas as seguintes versões:

* Apache 2.x
* Nginx 1.7.x

### Banco de dados

* MySQL 5.6 (Oracle or Percona)
* Mariadb 10.0

### PHP

* PHP 5.6.x

É válido ressaltar que a versão 5.6 do PHP receberá suporte de segurança apenas até Dezembro de 2018; após essa data,
ela será completamente descontinuada. Para mais informações, o manual do PHP possui um informativo sobre as [versões suportadas](http://php.net/supported-versions.php).

## Instalação

Esse módulo utiliza o SDK PHP como dependência. Por isso é importante que, assim que o módulo for clonado, seja feita sua instalação:

```bash
composer install
```

Feito isso, basta enviar tudo para o raiz da instalação do Magento - via ftp ou ssh - mesclando e/ou sobrescrevendo conforme solicitado.
