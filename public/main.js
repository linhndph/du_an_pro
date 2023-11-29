let slideIndex;

function slideAuto(){

    let slide = document.getElementsByClassName('slide');
    for (let i = 0; i < slide.length; i++) {
        slide[i].style.display = 'none';
        
    }
    slide[slideIndex].style.display = 'block';
    slideIndex++;
    if(slideIndex > slide.length-1){
        slideIndex = 0;
    }

    setTimeout(slideAuto, 3000);
    
}

slideAuto(slideIndex = 0);

// Lấy tham chiếu đến phần tử chữ cần thay đổi màu
var colorChangingText = document.getElementById('colorChangingText');

// Mảng màu sắc có thể sử dụng
var colors = ['#FFA500', '#FF8C00', '#FF7F50', '#FF6347', '#FF4500'];

// Hàm để thay đổi màu của chữ
function changeColor() {
  // Lấy một màu ngẫu nhiên từ mảng
  var randomColor = colors[Math.floor(Math.random() * colors.length)];
  
  // Thay đổi màu của chữ
  colorChangingText.style.color = randomColor;
}

// Thiết lập một interval để thay đổi màu liên tục (mỗi 2 giây trong ví dụ này)
setInterval(changeColor, 1000);