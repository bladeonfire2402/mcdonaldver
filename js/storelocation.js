const StoreLocation=[
    {
        title:"McDonald Vincom GrandPard",
        location:"L1-18, Trung Tâm Thương Mại Vincom Mega Mall Grand Park, 88 Phước Thiện, Long Bình, Tp. Thủ Đức",
        link:"https://www.google.com/maps/place/10.843098,%20106.843283",
        openTimes:"8AM",
        closeTimes:"11PM",
        city:"Thủ Đức",
        iframeSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31350.29659795697!2d106.68310437431643!3d10.82760030000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175298c5a1072a1%3A0xe2324c835ff144d8!2sMcDonald&#39;s%20Giga%20Mall!5e0!3m2!1svi!2s!4v1729689626882!5m2!1svi!2s",
    },
    {
        title:"McDonald’s Nguyễn Văn Linh",
        location:"5 - 7 Nguyễn Văn Linh, Phường Bình Hiên, Quận Hải Châu, Tp. Đà Nẵng",
        link:"https://www.google.com/maps/place/16.060836746527023,%20108.222311171164",
        openTimes:"8AM",
        closeTimes:"11PM",
        city:"Đà Nẵng",
        iframeSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.0935280400595!2d108.21974697490388!3d16.060635684617587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142193fcca2f9c1%3A0x3c08a6102447bbb4!2sMcDonald&#39;s%20Nguy%E1%BB%85n%20V%C4%83n%20Linh!5e0!3m2!1svi!2s!4v1729689987265!5m2!1svi!2s",
    },
    {
        title:"McDonald's Đa Kao",
        location:"2-6Bis Điện Biên Phủ, Đa Kao, Quận 1, Hồ Chí Minh 70000, Việt Nam",
        link:"https://maps.app.goo.gl/mrUp1TzNKK8rKrJw8",
        openTimes:"8AM",
        closeTimes:"11PM",
        city:"Hồ Chí Minh",
        iframeSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31353.959238507618!2d106.66066697431643!3d10.792545500000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529c032abd229%3A0x3f28cabceeca1a32!2sMcDonald&#39;s%20%C4%90a%20Kao!5e0!3m2!1svi!2s!4v1729690141982!5m2!1svi!2s",
    },
    {
        title:"McDonald's Trần Não",
        location:"166 Đ. Trần Não, P. Bình An, Quận 2, Hồ Chí Minh 70000, Việt Nam",
        link:"https://maps.app.goo.gl/uPc4DMNfzLAcpY247",
        openTimes:"8AM",
        closeTimes:"11PM",
        city:"Hồ Chí Minh",
        iframeSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31354.078653074044!2d106.69195487431638!3d10.791400700000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527cc45a5fff3%3A0xdea26645b79a8baa!2zTWNEb25hbGQncyBUcuG6p24gTsOjbw!5e0!3m2!1svi!2s!4v1729690331559!5m2!1svi!2s",
    },
    {
        title:"McDonald’s Hồ Gươm",
        location:"2 P. Hàng Bài, Tràng Tiền, Hoàn Kiếm, Hà Nội, Việt Nam",
        link:"https://maps.app.goo.gl/1b3FKqYwu68uELfn7",
        openTimes:"8AM",
        closeTimes:"11PM",
        city:"Hà Nội",
        iframeSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7860307.591959813!2d100.94834084854139!3d15.854451956196058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abeb5042e3b1%3A0xebe111cd07a0bb1a!2zTWNEb25hbGTigJlzIEjhu5MgR8awxqFt!5e0!3m2!1svi!2s!4v1729690416546!5m2!1svi!2s",
    },
    {
        title:"McDonald's Thái Hà",
        location:"1 P. Thái Hà, Trung Liệt, Đống Đa, Hà Nội 100000, Việt Nam",
        link:"https://maps.app.goo.gl/bPXKW78ChKWYcrse7",
        openTimes:"8AM",
        closeTimes:"11PM",
        city:"Hà Nội",
        iframeSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7860307.591959813!2d100.94834084854139!3d15.854451956196058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad670c07735f%3A0x140b3f06aa3d787f!2zTWNEb25hbGQncyBUaMOhaSBIw6A!5e0!3m2!1svi!2s!4v1729690575751!5m2!1svi!2s",
    },
]

var city = ""; // Ban đầu không chọn thành phố
var BtnChangeHCM = document.querySelector('.HCM');
var BtnChangeHN = document.querySelector('.HN');
var BtnChangeDN = document.querySelector('.DN');
var BtnChangeTD = document.querySelector('.TD');
var StoreLocationList = document.querySelector('.storelocation-item-list');

// Đặt thành phố mặc định khi chưa chọn
var BtnCityChangeDefault = document.querySelector('.dropbtn');
BtnCityChangeDefault.innerText = "Chọn thành phố";

// Hàm thay đổi title khi bấm chọn thành phố
var ChangeCityTitleHandle = (city) => {
    if (!city) {
        BtnCityChangeDefault.innerText = "Chọn thành phố";
        
    } else {
        BtnCityChangeDefault.innerText = city;
    }
};

StoreLocation.map((item) => {
    // Tạo một div mới cho mỗi cửa hàng
    var StoreLocationItem = document.createElement('div');

    // Thêm nội dung vào StoreLocationItem
    StoreLocationItem.innerHTML = `
        <h3>${item.title}</h3>
        <p>${item.location}</p>
        <div>
        <p>Open: <strong>${item.openTimes} </strong> - Close: <strong>${item.closeTimes}</strong></p>
        <a href="${item.link}" target="_blank">View on Map</a>
        </div>
    `;

    // Thêm phần tử vào danh sách StoreLocationList trong DOM
    StoreLocationList.appendChild(StoreLocationItem);
    StoreLocationItem.classList.add('StoreLocation-Items', 'radius');
});



function RenderCityList(city){
    var filterHCM=StoreLocation.filter(item=>item.city===city)
        console.log(filterHCM)
        filterHCM.map((item) => {
            // Tạo một div mới cho mỗi cửa hàng
            var StoreLocationItem = document.createElement('div');
        
            // Thêm nội dung vào StoreLocationItem
            StoreLocationItem.innerHTML = `
                <h3>${item.title}</h3>
                <p>${item.location}</p>
                <div>
                <p>Open: <strong>${item.openTimes} </strong> - Close: <strong>${item.closeTimes}</strong></p>
                <a href="${item.link}" target="_blank">View on Map</a>
                </div>
            `;
        
            // Thêm phần tử vào danh sách StoreLocationList trong DOM
            StoreLocationList.appendChild(StoreLocationItem);
            StoreLocationItem.classList.add('StoreLocation-Items', 'radius');
        });

}

// Gọi sự kiện khi bấm các nút thành phố
function setEventListeners() {
    BtnChangeHCM.addEventListener('click', () => {
        StoreLocationList.innerHTML=''
        city = "Hồ Chí Minh";
        ChangeCityTitleHandle(city);
        RenderCityList(city)
    });

    BtnChangeHN.addEventListener('click', () => {
        StoreLocationList.innerHTML=''
        city = "Hà Nội";
        ChangeCityTitleHandle(city);
        console.log(city);
        RenderCityList(city)
    });

    BtnChangeDN.addEventListener('click', () => {
        StoreLocationList.innerHTML=''
        city = "Đà Nẵng";
        ChangeCityTitleHandle(city);
        console.log(city);
        RenderCityList(city)
    });

    BtnChangeTD.addEventListener('click', () => {
        StoreLocationList.innerHTML=''
        city = "Thủ Đức";
        ChangeCityTitleHandle(city);
        console.log(city);
        RenderCityList(city)
    });
}

// Gọi hàm để thiết lập các sự kiện
setEventListeners();



console.log(city)


// Render danh sách địa điểm





