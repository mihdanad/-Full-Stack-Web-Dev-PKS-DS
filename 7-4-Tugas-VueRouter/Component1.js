export const Component1 = {
    data () {
        return {
            cars: [
                {
                    id: 1,
                    merk: 'Toyota'
                },
                {
                    id: 2,
                    merk: 'Suzuki'
                },
                {
                    id: 3,
                    merk: 'Mercedes Benz'
                },
                {
                    id: 4,
                    merk: 'Porsche'
                },
                {
                    id: 5,
                    merk: 'Honda'
                },
                {
                    id: 6,
                    merk: 'Lamborghini'
                },
                {
                    id: 7,
                    merk: 'Bi EM Dabel Yu'
                },
                {
                    id: 8,
                    merk: 'Mitsubishi'
                },
                {
                    id: 9,
                    merk: 'Audi'
                },
                {
                    id: 10,
                    merk: 'Ferrari'
                },
            ]
        }
    },
    template: `
        <div>
            <h1>Daftar Mobil</h1>
            <ul>
                <li v-for="car of cars">
                    <router-link :to="'/halaman1/'+car.id" > 
                        {{ car.merk }} 
                    </router-link>
                </li>
            </ul>
        </div>
    ` 
}