import './bootstrap';

const sel_type = new Selectr(document.querySelector('#type'), {
   placeholder: "Type",
   searchable: false,
   messages: {
      noOptions: "Type",
   }
});
const sel_country = new Selectr(document.querySelector('#country'), {
   placeholder: "Country",
   messages: {
      noOptions: "Country",
   }
});
const sel_state = new Selectr(document.querySelector('#state'), {
   placeholder: "State",
   messages: {
      noOptions: "State",
   }
});
sel_state.disable();


sel_type.on('selectr.select', function(option) {
   showLoading();
   getCompanies(getParams()).then(data => {
      console.log(data);
      renderCompanies(data);
   })
});
sel_country.on('selectr.select', function(option) {
   showLoading()
   getCompanies(getParams()).then(data => {
      console.log(data);
      renderCompanies(data);
      refreshStates(data.states);
   })
});
sel_state.on('selectr.select', function(option) {
   showLoading()
   getCompanies(getParams()).then(data => {
      console.log(data);
      renderCompanies(data);
   })
});


const searchText = document.getElementById("search-text");
searchText.addEventListener("keypress", function(event) {
   if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("search-button").click();
   }
});

const searchButton = document.getElementById("search-button");
searchButton.addEventListener("click", function(event) {
   // console.log(searchText.value.length)
   if(searchText.value.length){
      let queryString = '?keyword='+searchText.value;
      searchCompanies(queryString).then(data => {
         console.log(data);
         renderCompanies(data);
      })
   }
});


function getParams(){
   const params = {
      status: document.getElementById('type').value != 0 ? document.getElementById('type').value : null,
      country: document.getElementById('country').value != 0 ? document.getElementById('country').value : null,
      state: document.getElementById('state').value != 0 ? document.getElementById('state').value : null
   };
   let esc = encodeURIComponent;
   return '?' + Object.keys(params).map(k => esc(k) + '=' + (params[k] ? esc(params[k]):'')).join('&');
}


function renderCompanies(data){
   document.getElementById('search-results').innerHTML = "";
   if(data.companies.length){
      data.companies.forEach((company) => {
         let searchResult = document.createElement('div');
         searchResult.setAttribute('class', 'search-result');
         document.getElementById("search-results").appendChild(searchResult);

         let companyLogo = document.createElement('div');
         companyLogo.setAttribute('class', 'company-logo');
         searchResult.appendChild(companyLogo);

         let image = document.createElement('img');
         image.setAttribute('src', company.logo);
         companyLogo.appendChild(image);

         let companyDetails = document.createElement('div');
         companyDetails.setAttribute('class', 'company-details');
         searchResult.appendChild(companyDetails);

         let companyTitle = document.createElement('span');
         companyTitle.setAttribute('class', 'company-title');
         companyTitle.innerHTML=company.company;
         companyDetails.appendChild(companyTitle);

         let companyAddress = document.createElement('span');
         companyAddress.setAttribute('class', 'company-address');
         companyAddress.innerHTML=company.address;
         companyDetails.appendChild(companyAddress);

         let companyContact = document.createElement('div');
         companyContact.setAttribute('class', 'company-contact');
         searchResult.appendChild(companyContact);

         let link = document.createElement('a');
         link.setAttribute('href', company.website);
         link.setAttribute('class', 'company-website');
         link.innerHTML='website';
         companyContact.appendChild(link);

         let companyPhone = document.createElement('span');
         companyPhone.setAttribute('class', 'company-phone');
         companyPhone.innerHTML=company.phone;
         companyContact.appendChild(companyPhone);

         let partnerType = document.createElement('div');
         partnerType.setAttribute('class', 'partner-type');
         searchResult.appendChild(partnerType);

         let partnerStatus = document.createElement('span');
         partnerStatus.innerHTML=company.status;
         partnerType.appendChild(partnerStatus);     
         
      });
   }else{
      let noResult = document.createElement('div');
      noResult.setAttribute('class', 'no-result');
      document.getElementById("search-results").appendChild(noResult);

      let noResultSpan = document.createElement('span');
      noResultSpan.innerHTML="Your search parameters did not match any partners. Please try different search.";
      noResult.appendChild(noResultSpan);
   }
}


const getCompanies = async (queryString) => {
   return await axios.get(`api/get-companies?${queryString}`)
      .then(response => {
         console.log('returned data')
         return response.data
      }).catch(error => console.log(error));
};

const searchCompanies = async (queryString) => {
   return await axios.get(`api/search-companies?${queryString}`)
      .then(response => {
         console.log('returned data')
         return response.data
      }).catch(error => console.log(error));
};



function refreshStates(states){
   if(states.length){
      sel_state.enable();
      sel_state.removeAll();
      states.forEach(state=>{
      sel_state.add({
            value: state.short_name,
            text: state.name
         });
      });
   }else{
      sel_state.disable();
   }
}

function showLoading(){
   let loading = document.createElement('div');
   loading.setAttribute('class', 'loading');
   document.getElementById("search-results").appendChild(loading);
   let loadingSpan = document.createElement('span');
   loadingSpan.innerHTML="Loading...";
   loading.appendChild(loadingSpan);  
}