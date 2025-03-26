document.addEventListener("DOMContentLoaded", fetchData);
const inputBox=document.querySelector(".input-box");
const searchBtn=document.getElementById("searchBtn");

async function fetchData(dis) {
    const apiUrl = `https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070?api-key=579b464db66ec23bdd000001cdd3946e44ce4aad7209ff7b23ac571b&format=json&filters[district]=\ ${dis}`;
    
    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        // Extract relevant records
        const records = data.records;
        console.log(records);
        // Reference to table body
        const tableBody = document.getElementById("priceTable");
        tableBody.innerHTML = ""; // Clear old data

        records.forEach(record => {
            let modalPricePerKg = (parseFloat(record.modal_price) / 100).toFixed(2); // Convert ₹/quintal to ₹/kg

            let row = `
                <tr>
                    <td>${record.market}</td>
                    <td>${record.commodity}</td>
                    <td>${modalPricePerKg} ₹/kg</td>
                       <td>${record.arrival_date}</td>
                
    

                </tr> 
            `;
            tableBody.innerHTML += row;
        });

    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

searchBtn.addEventListener('click',()=>{
    fetchData(inputBox.value);
});