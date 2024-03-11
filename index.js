function openGrafico(anos, qtdes) {
    var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'Vendas por ano',
            data: qtdes
        }],
        xaxis: {
            categories: anos
        }
    }
    
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    
    chart.render();
}

function enviaDados(params) {
    let array = params.split(';');
    let qtdes = [];
    let anos = [];
    for (let i = 0 ; i < array.length ; i++) {
        let newArray = array[i].split(',');
        anos.push(newArray[2]);
        qtdes.push(newArray[1]);
    }
    openGrafico(anos, qtdes)
}