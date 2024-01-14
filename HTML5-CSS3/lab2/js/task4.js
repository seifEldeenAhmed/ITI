let oragnizationData=document.getElementById('organization');
let data=JSON.parse(oragnizationData.innerHTML);

navigator.geolocation.getCurrentPosition(tracked)

function tracked(position){
    // console.log(position);
    let latitude= position.coords.latitude;
    let longitude= position.coords.longitude;
    // console.log(latitude,longitude);
    data.geo.latitude=latitude;
    data.geo.longitude=longitude;
    console.log(latitude, longitude);
    oragnizationData.textContent=JSON.stringify(data)
    console.log(oragnizationData.textContent);
}

