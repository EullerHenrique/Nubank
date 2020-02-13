
class Bd{
    constructor() {
        let id = localStorage.getItem('id');// obtem o value da key 'id'

        if (id === null) {
            localStorage.setItem('id', 0);//cria a key id e value = 0
        }
    }

    getProximoId() {
            let proximoId = localStorage.getItem('id'); //obtem o value da key 'id'
            return parseInt(proximoId)+1;
    }

    gravar(d) {
        let id = this.getProximoId();

        localStorage.setItem('id',id); //muda o valor da key 'id'
        localStorage.setItem(id, JSON.stringify(d)); //insere uma nova key com o valor do indice de 'id' e um novo value com os dados do objeto
    }

    extrairTodosPagamentos(){
        //Array de pagamentos
        let pagamentos = Array();

        let id = localStorage.getItem('id');

        //O loop usa o id dos pagamentos para recuperar todos os pagamentos cadastrados em localStorage
        for(let i = 1; i <= id; i++){

            //Recupera o pagamento
            let pagamento = JSON.parse(localStorage.getItem(i)); //Transforma a string em objeto

            //Testa se existe a possibilidade de existir índices que foram removidos
            //Se existir, esses índices serão ignorados
            if(pagamento !== null){

                //Insere a key do bd como uma key do objeto
                pagamento.id = i;

                //Insere o pagamento no array de pagamentos
                pagamentos.push(pagamento);

            }
        }
        return pagamentos;
    }

    pesquisar(pagamento){
        let pagamentosFiltrados = this.extrairTodosPagamentos();

        //Filter ano
        if(pagamento.ano !== '') {
            pagamentosFiltrados = pagamentosFiltrados.filter(d => d.ano === pagamento.ano);
        }
        //Filter mes
        if(pagamento.mes !== '') {
            pagamentosFiltrados = pagamentosFiltrados.filter(d => d.mes === pagamento.mes);
        }

        //Filter dia
        if(pagamento.dia !== '') {
            pagamentosFiltrados = pagamentosFiltrados.filter(d => d.dia === pagamento.dia);
        }
        //Filter tipo
        if(pagamento.tipo !== '') {
            pagamentosFiltrados = pagamentosFiltrados.filter(d => d.tipo === pagamento.tipo);
        }

        //Filter descricao
        if(pagamento.descricao !== '') {
            pagamentosFiltrados = pagamentosFiltrados.filter(d => d.descricao === pagamento.descricao);
        }

        //Filter valor
        if(pagamento.valor !== '') {
            pagamentosFiltrados = pagamentosFiltrados.filter(d => d.valor === pagamento.valor);
        }
        return pagamentosFiltrados;
    }

    remover(id){
        localStorage.removeItem(id);
    }
}

let bd = new Bd();

class Pagamento {
    constructor(ano, mes, dia, tipo, descricao, valor) {
        this.ano = ano;
        this.mes = mes;
        this.dia = dia;
        this.tipo = tipo;
        this.descricao = descricao;
        this.valor = valor;
    }

    validarDados() {
        for (let i in this) {
            if (this[i] === undefined || this[i] === '' || this[i] === null) {
                return false;
            }
        }
        return true;
    }
}

function cadastrarPagamento() {
    let ano = document.getElementById('ano');
    let mes = document.getElementById('mes');
    let dia = document.getElementById('dia');
    let tipo = document.getElementById('tipo');
    let descricao = document.getElementById('descricao');
    let valor = document.getElementById('valor');

    console.log(ano.value, mes.value, dia.value, tipo.value, descricao.value, valor.value);
    let pagamento = new Pagamento(ano.value, mes.value, dia.value, tipo.value, descricao.value, valor.value);

    if(pagamento.validarDados()) {
        bd.gravar(pagamento);

        document.getElementById('modal_titulo').innerHTML = 'Sucesso';
        document.getElementById('modal_titulo_div').className = ' modal-header text-sucess';
        document.getElementById('modal_conteudo').innerHTML = 'Seu pagamento foi agendado';
        document.getElementById('modal_btn').innerHTML = 'Voltar';
        document.getElementById('modal_btn').className = "btn btn-success";
        $('#modalRegistraDespesa').modal('show');

        ano.value = '';
        mes.value = '';
        dia.value = '';
        descricao.value = '';
        tipo.value = '';
        valor.value = '';

    }else{

        document.getElementById('modal_titulo').innerHTML = 'Erro';
        document.getElementById('modal_titulo_div').className = ' modal-header text-danger';
        document.getElementById('modal_conteudo').innerHTML = 'Existem campos obrigatórios que não foram preenchidos';
        document.getElementById('modal_btn').innerHTML = 'Voltar e corrigir';
        document.getElementById('modal_btn').className = "btn btn-danger";
        $('#modalRegistraDespesa').modal('show');
    }
}

    function inserirTodosPagamentos(tipo, pagamento) {
        let pagamentos;
        let historicoPagamentos;

        if(tipo === 1) {
            pagamentos = bd.extrairTodosPagamentos();
        }else if(tipo === 2){
            pagamentos =  bd.pesquisar(pagamento);
        }

        //Seleciona o elemento tbody da tabela
        historicoPagamentos = document.getElementById('historicoPagamentos');
        historicoPagamentos.innerHTML = '';

        //Percorre o array pagamentos, inserindo na tabela de forma dinamica cada pagamento realizado
        pagamentos.forEach(function (d) {

            //Cria a linha da tabela (tr)
            let linha = historicoPagamentos.insertRow();

            //Cria as colunas (td)
            let dia = d.dia;
            let mes = d.mes;

            if(dia<= 9) {
                dia = 0+dia;
            }
            if(d.mes <= 9){
                mes = 0+mes;
            }

            linha.insertCell(0).innerHTML = `${dia}/${mes}/${d.ano}`;
            linha.insertCell(1).innerHTML = d.tipo;
            linha.insertCell(2).innerHTML = d.descricao;
            linha.insertCell(3).innerHTML = d.valor;

            //Cria o botão de exclusão
            let btn = document.createElement('button');
            btn.className  = 'btn btn-danger';
            btn.innerHTML = '<span class="fas fa-times"></span>';
            btn.id = d.id;
            btn.onclick = function(){
                //Remove o pagamento

                bd.remover(this.id);
                window.location.reload();
            };
            linha.insertCell(4).append(btn);
        });
    }


    function pesquisarPagamento() {
        let ano = document.getElementById('ano').value;
        let mes = document.getElementById('mes').value;
        let dia = document.getElementById('dia').value;
        let tipo = document.getElementById('tipo').value;
        let descricao = document.getElementById('descricao').value;
        let valor = document.getElementById('valor').value;

        let pagamento = new Pagamento(ano, mes, dia, tipo, descricao, valor);
        inserirTodosPagamentos(2, pagamento);


    }


