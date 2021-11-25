var readBooksPromise = require('./promise.js')
 
var books = [
    {name: 'LOTR', timeSpent: 3000}, 
    {name: 'Fidas', timeSpent: 2000}, 
    {name: 'Kalkulus', timeSpent: 4000},
    {name: 'komik', timeSpent: 1000}
]

readBooksPromise(10000, books[0])
.then(sisa1 =>{
    readBooksPromise(sisa1, books[1])
    .then(sisa2 =>{
        readBooksPromise(sisa2, books[2])
        .then(sisa3 =>{
            readBooksPromise(sisa3, books[3])
            .then(sisa4 =>{
                console.log(sisa4)

            })
            .catch(error => console.log(error))
        })
        .catch(error => console.log(error))
    })
    .catch(error => console.log(error))
})
.catch(error => console.log(error))