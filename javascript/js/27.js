// let arr = [1, 2, 3, 4, 5];


// // push() : 배열에 값을 추가
// arr.push(6); // arr = [1,2,3,4,5,6];


// // splice() : 배열의 요소를 삭제 또는 교체
// // 삭제
// // arr.splice(2, 1); // 배열의 arr[2]에서부터 1개를 삭제함. arr = [1,2,4,5,6];
// // 추가 (교체)
// // arr.splice(2, 0, 10); // 배열의 arr[2]에 0개를 삭제하고 값이 10인 인덱스를 추가
// // 수정
// // arr.splice(2, 1, 10); // 배열의 arr[2]에 1개를 삭제하고 값이 10인 인덱스를 추가
// // arr.splice(2, 1, 'aaa');
// // 여러개 추가
// // arr.splice(2, 0, 10, 11, 12, 13); // 3번째 아규먼트부터는 가변파라미터로써 모든 값을 추가


// // indexOf() : 배열에서 특정 요소를 찾는데 사용.
// arr.indexOf(4); // 4가 몇번 인덱스에 존재하는지.


// // lastIndexOf() : 배열에서 특정 요소 중 가장 마지막에 위치한 요소를 찾는데 사용
// arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];
// arr.lastIndexOf(1); // 2


// // pop() : 배열의 가장 마지막 요소를 삭제하고 삭제한 요소의 값을 리턴함.
// arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];
// arr.pop(); // 10이 삭제됨
// let i_pop = arr.pop(); // 삭제한 값이 변수에 담김. (변수를 호출한다고 함수가 실행되는건 아님)


// sort() : 배열을 정렬
// arr = [5, 4, 6, 7, 3, 2];
// let arr_sort = arr.sort(function(a, b) {
//     return a - b;
// });


// arr.sort( (a, b) => a - b );
// // 둘다 같은 sort임.


// //sort, pop, push, splice등 몇몇 메소드들은 원본 자체를 변경시킴. (주의해서 사용할 것) (그냥 php에서 처리해서 프론트엔드로)
// // index같은 메소드는 원본을 변경시키지는 않음


// arr.sort( (a, b) => a - b ); // 오름차순 정렬 화살표함수 (a-b가 양수일 때 순서를 바꿈. 음수나 0이면 순서를 바꾸지 않음)
// 내림차순 정렬
// arr.sort((a,b) => b - a ); // (b-a가 양수일 때 순서를 바꿈. 음수나 0이면 순서를 바꾸지 않음)


// // 원본데이터와 별도로 새로 배열을 만드는 방법 ( Value Copy 방식 ) ( php는 값 복사, js는 주소 복사 형식이라 그럼 )
// let arr1 = arr; // 원본 자체를 대입. arr1을 변경하면 arr 원본도 변경됨
// let arr2 = Array.from(arr); // 원본의 값만 대입. arr2를 변경해도 arr 원본은 변경되지 않음


// includes() : 배열의 특정요소를 가지고 있는지 판별 (boolean값으로 리턴)
// arr = ['치킨', '육회비빔밥', '비엔나'];
// arr.includes('치킨'); // true
// arr.includes('짜장면'); // false

// let boo_includes = arr.includes('짜장면');



// // join() : 배열의 모든요소를 연결해서 하나의 문자열을 리턴
// arr.join(); // '치킨,육회비빔밥,비엔나' (파라미터로 아무것도 주지않으면 ,가 디폴트로 찍힘)
// arr.join(''); // '치킨육회비빔밥비엔나'
// arr.join("/"); // '치킨/육회비빔밥/비엔나'



// // map() : 배열의 모든요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴
// arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// // 모든 요소의 값 * 2를 한 결과를 배열로 얻고싶다
// let arr_map = arr.map( num => num * 2 );

// // 3의 배수는 '짝'
// arr_map = arr.map( num => {
//     if( num % 3 === 0 ) {
//         return '짝';
//     } else {
//         return num;
//     }
// });
// // [1,2,'짝',4,5,'짝']


// // some() : 주어진 함수를 만족하는 요소가 있는지 판별 (return boolean) (조건을 만족하는 요소가 하나라도 있으면 true)
// arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// let boo_some = arr.some( num => num > 10 ); // false
// boo_some = arr.some( num => num === 9 ); // true


// every() : 배열의 모든요소가 주어진 함수에 만족하면 true, 하나라도 만족 안하면 false (return boolean)
// arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// let boo_every = arr.every( num => num === 9 ); // false


// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
// arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// let boo_filter = arr.filter( num => num % 3 === 0 ); // [3, 6, 9]


