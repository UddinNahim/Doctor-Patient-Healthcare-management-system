// function darkMode() {
// 		var element = document.body;
// 		element.className = "dark-mode";
		
// 	}
// 	function lightMode() {
// 		var element = document.body;
// 		element.className = "light-mode";
		
// }
	

// // Sample doctor data
// const doctors = [
//   {
//     name: "Dr. Tareq Ahmed",
//     hospital: "National Institute Of Mental Health",
//     specialist: "Psychiatry & Drug Addiction",
//     city: "Dhaka",
//   },
//   {
//     name: "Dr. Shamsuzzaman",
//     hospital: "MBBS, DCH (Ireland), MPH (NSU)",
//     specialist: "Child Specialist",
//     city: "Barishal",
//   },
//   // Add more doctor data here
// ];

// // Function to find a doctor by name
// function findDoctorByName() {
//   const doctorName = document.getElementById("doctorNameInput").value;
//   const resultContainer = document.getElementById("resultContainer");

//   const doctor = doctors.find((doc) => doc.name === doctorName);

//   if (doctor) {
//     resultContainer.innerHTML = generateDoctorCard(doctor);
//   } else {
//     resultContainer.innerHTML = "Doctor not found.";
//   }
// }

// // Function to filter doctors by specialist
// function filterDoctorsBySpecialist() {
//   const selectedSpecialist = document.getElementById("specialists").value;
//   const resultContainer = document.getElementById("resultContainer");

//   const filteredDoctors = doctors.filter((doc) =>
//     doc.specialist.includes(selectedSpecialist)
//   );

//   if (filteredDoctors.length > 0) {
//     resultContainer.innerHTML = generateDoctorsList(filteredDoctors);
//   } else {
//     resultContainer.innerHTML = "No doctors found for the selected specialist.";
//   }
// }

// // Function to select doctors by city
// function filterDoctorsByCity() {
//   const selectedCity = document.getElementById("city").value;
//   const resultContainer = document.getElementById("resultContainer");

//   const cityDoctors = doctors.filter((doc) => doc.city === selectedCity);

//   if (cityDoctors.length > 0) {
//     resultContainer.innerHTML = generateDoctorsList(cityDoctors);
//   } else {
//     resultContainer.innerHTML = "No doctors found in the selected city.";
//   }
// }

// // Function to generate a single doctor card
// function generateDoctorCard(doctor) {
//   return `
//     <div class="item">
//         <h3>${doctor.name}</h3>
//         <p>${doctor.hospital}</p>
//         <p>Specialist: ${doctor.specialist}</p>
//         <p>(City: ${doctor.city})</p>
//     </div>
//   `;
// }

// // Function to generate a list of doctor cards
// function generateDoctorsList(doctorList) {
//   return doctorList.map((doctor) => generateDoctorCard(doctor)).join("");
// }

// // Attach event listeners to the buttons
// document.getElementById("findDoctorButton").addEventListener("click", findDoctorByName);
// document.getElementById("specialists").addEventListener("change", filterDoctorsBySpecialist);
// document.getElementById("city").addEventListener("change", filterDoctorsByCity);
