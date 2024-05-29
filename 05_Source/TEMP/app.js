document.getElementById('get-weather').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            const apiKey = '6c3395dda5e449a4a1a0e3fda31e2a8f'; // Thay thế YOUR_API_KEY bằng API key của bạn
            getWeather(latitude, longitude, apiKey);
        }, showError);
    } else {
        displayError("Trình duyệt của bạn không hỗ trợ định vị địa lý.");
    }
});

function getWeather(lat, lon, apiKey) {
    const baseUrl = `https://api.weatherbit.io/v2.0/current?lat=${lat}&lon=${lon}&key=${apiKey}&include=minutely`;

    fetch(baseUrl)
        .then(response => response.json())
        .then(data => {
            if (data && data.data && data.data.length > 0) {
                displayWeather(data.data[0]);
            } else {
                displayError("Không tìm thấy dữ liệu thời tiết.");
            }
        })
        .catch(error => {
            displayError("Đã xảy ra lỗi khi lấy dữ liệu thời tiết.");
        });
}

function displayWeather(data) {
    const weatherDiv = document.getElementById('weather');
    weatherDiv.innerHTML = `
        <h2>Thời tiết ở ${data.city_name}, ${data.state_code}, ${data.country_code}</h2>
        <p>Nhiệt độ: ${data.temp}°C</p>
        <p>Nhiệt độ cảm nhận: ${data.app_temp}°C</p>
        <p>Áp suất: ${data.pres} hPa</p>
        <p>Độ ẩm: ${data.rh}%</p>
        <p>Tốc độ gió: ${data.wind_spd} m/s</p>
        <p>Hướng gió: ${data.wind_cdir_full} (${data.wind_cdir})</p>
        <p>Mô tả: ${data.weather.description}</p>
        <p>Mã thời tiết: ${data.weather.code}</p>
        <p>Chỉ số UV: ${data.uv}</p>
        <p>Chỉ số chất lượng không khí (AQI): ${data.aqi}</p>
        <p>Mây che phủ: ${data.clouds}%</p>
        <p>Tầm nhìn: ${data.vis} km</p>
        <p>Điểm sương: ${data.dewpt}°C</p>
        <p>Lượng mưa: ${data.precip} mm</p>
        <p>Thời gian quan sát: ${data.ob_time}</p>
        <p>Góc chiếu mặt trời: ${data.elev_angle}°</p>
        <p>Tên trạm: ${data.station}</p>
        <p>Mặt trời mọc: ${data.sunrise}</p>
        <p>Mặt trời lặn: ${data.sunset}</p>
    `;
}

function displayError(message) {
    const weatherDiv = document.getElementById('weather');
    weatherDiv.innerHTML = `<p>${message}</p>`;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            displayError("Người dùng đã từ chối yêu cầu định vị.");
            break;
        case error.POSITION_UNAVAILABLE:
            displayError("Thông tin vị trí không khả dụng.");
            break;
        case error.TIMEOUT:
            displayError("Yêu cầu lấy vị trí đã hết thời gian.");
            break;
        case error.UNKNOWN_ERROR:
            displayError("Đã xảy ra lỗi không xác định.");
            break;
    }
}
