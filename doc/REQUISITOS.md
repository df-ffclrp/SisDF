Requisitos do Sistema
=============  

## 1. Gerais

### 1.1 Panorama
Gerenciar chamados técnicos para os seguintes setores do Departamento de Física - FFCLRP:

* Oficina de Eletrônica
* Oficina Mecânica
* Manutenção Predial
* Seção Técnica de Informática
* Servir como base para a página do Departamento de Física

### 1.2 Funções Gerais do Sistema

* Relatórios de abertura, andamento e fechamento de chamados
* Relação de material gasto nos atendimentos
* Fonte de fornecimento do material (centro financeiro):
    * Solicitante
    * Departamento
* Identificação dos agentes em todo o processo de atendimento:
	- Solicitante (quem abriu o chamado)
	- Responsável pelo laboratório / projeto (docente, na maioria dos casos)
	- Dono do projeto (solicitado pelo setor de eletrônica)
		- ___Caso de uso:___ Aluno Lucas Barros precisa de uma peça de alumínio para o experimento X. 
	
	* Responsável pelo setor do atendimento
	***Caso de uso:*** docente responsável pelo Laboratório de Eletrônica	
	- Técnico(s) responsável(is) pelo atendimento	
* Suportar anotações de chamados externos
		* ***Caso de uso:*** Vincular o chamado de instalação de software a um chamado de aquisição de licença software junto ao CeTI-RP
		* ***Caso de uso:***  Vincular o chamado de manutenção de ar-condicionado à empresa externa prestadora de serviços
* Suportar anotações de andamento do chamado por parte do técnico.
		- ***Caso de uso:*** Solicitante não estava presente no momento do atendimento. Reagendado para o dia xx/yy/zzzz. O sistema deve permitir a entrada dessa informação e, no dia efetivo do atendimento, ser possível adicionar, no mesmo chamado técnico, o procedimento realizado.
	
* Permitir a impressão e reimpressão dos chamados abertos
* Permitir a alteração de uma informção no chamado caso o técnico atendendo encontre inconsistência nos dados informados
	- ***Caso de uso:*** Um solicitante procura o técnico para a realização do serviço informando que possui o material para a execução (fornecido pelo solicitante), no entanto, no momento da abertura, o solicitante comete um erro ao cadastrar o chamado. O técnico deve poder alterar essa informação e o sistema deve notificar por e-mail o solicitante.

### 1.3 Funções Secundárias do Sistema

- Gerenciamento de suprimentos de impressão (cartuchos de tinta e tonners)
- Geração de lista de suprimentos  de impressão a serem adquiridos nos períodos pertinentes (semestralmente, ao abrir pregão de aquisição)

### 1.4 Componentes adicionais do projeto

- Módulo de controle de acesso para docentes, funcionários e técnicos (sistema básico de autenticação)
- Módulo de notificações por e-mail
- Cadastro de salas e ramais
- Cadastro de setores técnicos 
- Cadastro de usuários do sistema
- Cadastro de responsável por setores de atendimento
- Relatórios
	- Abertura de chamados
	- Pesquisa de chamados por:
		- Código
		- Setor de Atendimento
		- Serviços finalizados e não finalizados
		
## 2. Específicos

### 2.1. Oficinas

As funções descritas na seção geral satisfazem os requisitos desses três setores de atendimento:

- Oficina Mecânica
- Oficina de Eletrônica
- Serviço de Manutenção Predial

### 2.1. Seção Técnica de Informática

O atendimento da Seção Técnica de Informática deve figurar em uma das categorias abaixo:

- Cadastramento de Ponto de Rede
- Atendimento Técnico 
	- ***Caso de uso:*** solicitar atendimento em local específico
- Suporte para Videoconferência
- Reportar Bug (no sistema de chamados ou site)
- Infraestrutura
	- ***Caso de uso:*** apenas para uso do técnic e supervisão da chefia. Categoria usada em tarefas de manutenção dos servidores e serviços do Departamento