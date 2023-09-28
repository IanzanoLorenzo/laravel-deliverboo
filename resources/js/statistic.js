
document.addEventListener('DOMContentLoaded', function () {
    // Estrai i dati per il primo grafico (ammontare vendite)
    let orderData = JSON.parse(document.getElementById('orderData').getAttribute('data-orderData'));

    let labels = [];
    let data = [];

    // Costruisci i dati per il primo grafico
    orderData.forEach(function (entry) {
        labels.push(entry.month + '-' + entry.year);
        data.push(entry.total_sales);
    });

    // Ottieni il contesto del canvas per il primo grafico
    let ctx = document.getElementById('orderStatistics').getContext('2d');

    // Crea il primo grafico a barre
    let myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ammontare Vendite',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0,
                    suggestedMax: 10000,

                    callback: function (value, index, values) {
                        if (value === 0) return '0€';
                        if (value === 1000) return '1000€';
                        if (value === 2000) return '2000';
                        if (value === 3000) return '3000';
                        if (value === 4000) return '4000';
                        if (value === 5000) return '5000';
                        if (value === 6000) return '6000';
                        if (value === 7000) return '7000';
                        if (value === 8000) return '8000';
                        if (value === 9000) return '9000';
                        if (value === 10000) return '10000';

                        return '';
                    }
                }
            }
        }
    });

    // Creazione del secondo grafico per gli ordini ricevuti
    let orderReceivedData = JSON.parse(document.getElementById('orderReceivedData').getAttribute('data-orderReceivedData'));

    let receivedLabels = [];
    let receivedData = [];

    // Costruisci i dati per il secondo grafico
    orderReceivedData.forEach(function (entry) {
        receivedLabels.push(entry.month + '-' + entry.year);
        receivedData.push(entry.order_count);
    });

    // Ottieni il contesto del canvas per il secondo grafico
    let receivedCtx = document.getElementById('orderReceivedStatistics').getContext('2d');

    // Crea il secondo grafico a barre
    let receivedBarChart = new Chart(receivedCtx, {
        type: 'bar',
        data: {
            labels: receivedLabels,
            datasets: [{
                label: 'Numero di Ordini Ricevuti',
                data: receivedData,
                backgroundColor: 'rgba(192, 75, 75, 0.5)',
                borderColor: 'rgba(192, 75, 75, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0,
                    suggestedMax: 10,

                    callback: function (value, index, values) {
                        if (value === 0) return '0';
                        if (value === 1) return '1';
                        if (value === 2) return '2';
                        if (value === 3) return '3';
                        if (value === 4) return '4';
                        if (value === 5) return '5';
                        if (value === 6) return '6';
                        if (value === 7) return '7';
                        if (value === 8) return '8';
                        if (value === 9) return '9';
                        if (value === 10) return '10';

                        return '';
                    }
                }
            }
        }
    });
});
