// Date
// let now = new Date(); // Date는 클래스가 아님
// let sDate = new Date('2023-09-30 19:20:10'); // Sat Sep 30 2023 19:20:10 GMT+0900 (한국 표준시)

// // getFullYear() : 연도만 가져오는 메소드
// let year = now.getFullYear(); 
// now.getFullYear(); // 2023

// // getMonth() : 월만 가져오는 메소드 (+1을 해줘야 현재 월과 같다)
// let month = now.getMonth(); 
// console.log(now.getMonth() + 1); // 10

// // getDate() : 일을 가져오는 메소드
// let date = now.getDate(); 
// console.log(now.getDate()); // 25

// // getDay() : 요일을 가져오는 메소드 ( 0(일요일) ~ 6(토요일) )
// let day = now.getDay(); 
// let kDay = '';
// switch (day) {
//     case 1:
//         kDay = '월요일';
//         break;
//     case 2:
//         kDay = '화요일';
//         break;
//     case 3:
//         kDay = '수요일';
//         break;
//     case 4:
//         kDay = '목요일';
//         break;
//     case 5:
//         kDay = '금요일';
//         break;
//     case 6:
//         kDay = '토요일';
//         break;
//     case 7:
//         kDay = '일요일';
//         break;
// }
// console.log(now.getDay()); // Wed

// // getHours() : 시를 가져오는 메소드
// let hours = now.getHours(); 
// console.log(now.getHours()); 

// // getMinutes() : 분을 가져오는 메소드
// let minutes = now.getMinutes(); 
// console.log(now.getMinitues()); 

// // getSeconds() : 초를 가져오는 메소드
// let seconds = now.getSeconds(); 
// console.log(now.getSeconds()); 

// // getMilliseconds() : 밀리 초를 가져오는 메소드
// let milliseconds = now.getMilliseconds(); 
// console.log(now.getMilliseconds()); 

// let now_date = year + "년" + month + "월" + date + "일";


// // getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리 초를 가져온다
// now.getTime(); // 1698207572298


// // 기준일 : 2023-09-30 19-:20:10
// // 오늘로부터 몇일 전인지 구해봅시다
// now = new Date(); // 오늘 Date
// sDate = new Date('2023-09-30 00:00:00');

// // let diff = Math.abs(now.getTime() - sDate.getTime());
// // let tofrom = Math.ceil(diff / (1000 * 60 * 60 *24));

// let tt = Math.abs(Math.floor((now - sDate) / 86400000));

// // let now2 = new Date(year, month-1, date, 0, 0, 0, 0); // 오늘날짜 0시 0분 0초 0밀리초 가져오는 방법
