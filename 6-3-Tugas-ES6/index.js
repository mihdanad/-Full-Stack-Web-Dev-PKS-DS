//SOAL 1

const luasKelilingPersegi = (Panjang, Lebar) => {
        Luas = Panjang * Lebar,
        Keliling = 2 * (Panjang + Lebar)
    
        console.log(Luas, Keliling)
};

luasKelilingPersegi(5, 5) // 25 20

console.log(" ")

//SOAL 2

const newFunction = (firstName, lastName) => {
      firstName,
      lastName,
      fullName = `${firstName} ${lastName}`
    }  

    newFunction("William", "Imoh")

    console.log(fullName)

console.log(" ")
//SOAL 3

const newObject = {
    firstName: "Muhammad",
    lastName: "Iqbal Mubarok",
    address: "Jalan Ranamanyar",
    hobby: "playing football",
  }
  
  const {firstName, lastName, address, hobby} = newObject
//Driver Code
  console.log(firstName, lastName, address, hobby)

console.log(" ")
//SOAL 4

const west = ["Will", "Chris", "Sam", "Holly"]
const east = ["Gill", "Brian", "Noel", "Maggie"]
const combined = [...west, ...east]

//Driver Code
console.log(combined)

console.log(" ")
//SOAL 5

const planet = "earth" 
const view = "glass" 
const before = `Lorem ${view} dolor sit amet, consectetur adipiscing elit, ${planet}` 
 
console.log(before)

