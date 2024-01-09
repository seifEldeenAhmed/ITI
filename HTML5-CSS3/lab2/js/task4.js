let oragnizationData=document.getElementById('organization');
const data=JSON.parse(oragnizationData.textContent.split('">')[1])
const header=oragnizationData.textContent.split('">')[0]

navigator.geolocation.getCurrentPosition(tracked)

function tracked(position){
    // console.log(position);
    let latitude= position.coords.latitude;
    let longitude= position.coords.longitude;
    // console.log(latitude,longitude);
    data.geo.latitude=latitude;
    data.geo.longitude=longitude;
    console.log(latitude, longitude);
    oragnizationData.textContent=header+'">'+JSON.stringify(data)
    console.log(oragnizationData.textContent);
}

