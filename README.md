# Importante

Também é possível fazer o download da [última release](https://github.com/DevelopersRede/magento1/releases/latest/download/magento.zip). Essa versão já contém as dependências, então basta descompactar o pacote e enviá-lo para o servidor da plataforma.

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

* PHP 5.6 ou superior

É válido ressaltar que a versão 5.6 do PHP receberá suporte de segurança apenas até Dezembro de 2018; após essa data,
ela será completamente descontinuada. Para mais informações, o manual do PHP possui um informativo sobre as [versões suportadas](http://php.net/supported-versions.php).

## Instalação

Esse módulo utiliza o SDK PHP como dependência. Por isso é importante que, assim que o módulo for clonado, seja feita sua instalação:

```bash
composer install
```

Feito isso, basta enviar tudo para o raiz da instalação do Magento - via ftp ou ssh - mesclando e/ou sobrescrevendo conforme solicitado.


## Chave de integração
Antes de iniciar a integração, é necessário gerar a chave de integração no portal da Rede.

1.	Acesse o portal use Rede e realize o login;
2.	Entre no menu e-commerce e selecione a opção chave de integração;
3.	Clique em gerar chave de integração para obtê-la.

Pronto! chave de integração gerada.

### Instalação

**Etapa 1 - Backup dos dados**

Por questão de boas práticas realize o backup da loja e banco de dados antes de fazer qualquer tipo de instalação.

**Etapa 2 - Desabilitar compilação**

Antes de instalar o módulo desabilite a opção de compilação no Backoffice da plataforma

* Faça login no painel administrativo
* Navegue até _System > Tools > Compilation_;
* Se o compilador tiver habilitado, clique em desabilitar.

**Etapa 3 - Instalando o módulo e.Rede**

Após realizar o download do arquivo siga as seguintes instruções:

* Descompacte o conteúdo do arquivo dentro da raiz da instalação da loja Magento, mesclando com os arquivos já existentes;
* Na área administrativa da loja vá até _System > cache Management_ e limpe o cache da loja para que a opção e.Rede seja exibida na barra de menu;

**Etapa 4 – Configurando o módulo**

Após a instalação, navegue na opção e.Rede na barra de menu e clique em Configurações.

**Etapa 4.1 – Configurações do método de pagamento**

* _Ativado (Enabled)_ – ativa/desativa o módulo de pagamento do e.Rede;
* _Ambiente (Environment)_ – seleciona o ambiente onde serão realizadas as transações (Produção/Teste);
* _Filiação (Affiliation)_ – número de filiação do estabelecimento na Rede;
* _Token_ – chave de integração da API do e.Rede adquirido no portal da Rede em e.commerce > Chave de integração > Gerar chave de integração;
* _Título (Title)_ – título do meio de pagamento que será exibido ao comprador no momento da compra;
* _Tipo de transação (Transaction Type)_ – Seleciona se as transações serão com captura automática ou posterior;
* _Número máximo de parcelas (Maximum number of installments)_ – quantidade de parcelas mostrada pela loja no ato da compra;
* _Valor mínimo para parcelamento (Minimum amount for installment)_ – valor mínimo do pedido para ativar o parcelamento;
* _Valor mínimo da parcela (Minimum installment amount)_ – limita um valor mínimo para cada parcela;
* _Nome na fatura (Soft Descriptor)_ – mensagem que será exibida ao lado do nome do estabelecimento na fatura do portador.

**Etapa 5 – Tipos de transações**

Nas configurações do módulo é possível informar o tipo de transações a ser realizada.

* Captura automática – a transação é capturada automaticamente no momento da confirmação do pagamento.
* Captura posterior – a transação é autorizada, porém permite que a captura seja realizada posteriormente dentro da área administrativa da loja.

**Etapa 5.1 – Captura**

Após a realização de uma transação de autorização (com captura posterior) é possível capturá-la através do painel administrativo da loja.

Acesse _Sales > Orders_ e localize a transação;
Clique no botão Capturar para efetivar a captura da transação;

**Etapa 5.2 – Atualização**

A atualização permite buscar o status da transação no sistema da Rede em tempo real.

Acesse _Sales > Orders_ e localize a transação;
Clique no botão atualizar;

**Etapa 5.3- Cancelamento**

O cancelamento só é possível para transações que tenham sido autorizadas ou capturadas.

Acesse _Sales > Orders_ e localize a transação;
Clique no botão Estornar para efetivar o cancelamento da transação;

**Etapa 6 – Logs**

A cada transação realizada na loja Magento, um log é gerado com todos os detalhes da transação. Para habilitá-lo vá até a área administrativa em _System > Configuration > Developer > Log Settings_ e mude a opção enabled para _Yes_

Após habilitar a opção, o log estará disponível no arquivo system.log dentro da pasta var/log no local de instalação do Magento.

