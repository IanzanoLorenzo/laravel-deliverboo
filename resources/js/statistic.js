
document.addEventListener('DOMContentLoaded', function () {
    // Estrai i dati per il primo grafico (ammontare vendite)
    let orderData = JSON.parse(document.getElementById('orderData').getAttribute('data-orderData'));

    // Calcola la data dell'ultimo ordine ricevuto
    const lastPayment = orderData.reduce((maxDate, entry) => {
        const entryDate = new Date(entry.year, parseInt(entry.month) - 1);
        return entryDate > maxDate ? entryDate : maxDate;
    }, new Date(1970, 0)); // Data iniziale di riferimento

    // Inizializza gli array di etichette e dati con 12 elementi vuoti
    let labels = Array(12).fill('');
    let data = Array(12).fill(0);

    // Cicla attraverso i dati per calcolare gli indici dei mesi
    orderData.forEach(function (entry) {
        const monthIndex = (lastPayment.getFullYear() - entry.year) * 12 + (lastPayment.getMonth() - parseInt(entry.month)) + 1;
        labels[11 - monthIndex] = entry.month + '-' + entry.year; // Invertiamo l'ordine delle etichette
        data[11 - monthIndex] = entry.total_sales; // Invertiamo l'ordine dei dati
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
                    suggestedMax: 1000,
                    callback: function (value, index, values) {
                        if (value === 0) return '0';
                        if (value === 100) return '100';
                        if (value === 200) return '200';
                        if (value === 300) return '300';
                        if (value === 400) return '400';
                        if (value === 500) return '500';
                        if (value === 600) return '600';
                        if (value === 700) return '700';
                        if (value === 800) return '800';
                        if (value === 900) return '900';
                        if (value === 1000) return '1000';

                        return '';
                    }
                }
            }
        }
    });




    // Creazione del secondo grafico per gli ordini ricevuti
    let orderReceivedData = JSON.parse(document.getElementById('orderReceivedData').getAttribute('data-orderReceivedData'));

    // Calcola la data dell'ultimo ordine ricevuto
    const lastOrderDate = orderReceivedData.reduce((maxDate, entry) => {
        const entryDate = new Date(entry.year, parseInt(entry.month) - 1);
        return entryDate > maxDate ? entryDate : maxDate;
    }, new Date(1970, 0)); // Data iniziale di riferimento

    // Calcola la data corrente
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth() + 1; // Il mese corrente, aggiungiamo 1 perché i mesi iniziano da 0

    // Calcola il numero di mesi tra l'ultimo ordine e il mese corrente
    const monthsDiff = (currentYear - lastOrderDate.getFullYear()) * 12 + (currentMonth - lastOrderDate.getMonth());

    // Inizializza gli array di etichette e dati con 12 elementi vuoti
    let receivedLabels = Array(12).fill('');
    let receivedData = Array(12).fill(0);

    // Cicla attraverso i dati per calcolare gli indici dei mesi
    orderReceivedData.forEach(function (entry) {
        const monthIndex = (lastOrderDate.getFullYear() - entry.year) * 12 + (lastOrderDate.getMonth() - parseInt(entry.month)) + 1;
        receivedLabels[11 - monthIndex] = entry.month + '-' + entry.year; // Invertiamo l'ordine delle etichette
        receivedData[11 - monthIndex] = entry.order_count; // Invertiamo l'ordine dei dati
    });

    // Aggiungi i mesi-anno mancanti all'array delle etichette
    for (let i = 0; i < monthsDiff && i < 12; i++) {
        const monthToAdd = (currentMonth - i) % 12;
        const yearToAdd = currentYear - Math.floor((currentMonth - i - 1) / 12);
        const monthIndex = 11 - i;
        receivedLabels[monthIndex] = monthToAdd + '-' + yearToAdd;
    }

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
