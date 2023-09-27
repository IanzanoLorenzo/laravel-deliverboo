
document.addEventListener('DOMContentLoaded', function () {
    // Estrai i dati per il primo grafico (ammontare vendite)
    let orderData = JSON.parse(document.getElementById('orderData').getAttribute('data-orderData'));

    let labels = [];
    let data = [];

    // Costruisci i dati per il primo grafico
    orderData.forEach(function (entry) {
        labels.push(entry.year + '-' + entry.month);
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
                    beginAtZero: true
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
        receivedLabels.push(entry.year + '-' + entry.month);
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
                    beginAtZero: true
                }
            }
        }
    });
});
