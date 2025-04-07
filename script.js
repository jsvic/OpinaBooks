const urlAtual = window.location.href

function mostrarRange() {
    let rnRating = document.querySelector('#rnRating')
    let outRanger = document.querySelector('#outRanger')

    outRanger.innerHTML = `${rnRating.value}⭐`
}

let arrUrl = urlAtual.split('/')
arrUrl.pop()
arrUrl = `${arrUrl.join('/')}/api/apiGet.php`
console.log(arrUrl)


const fetchApi = () => {
    const result = fetch(arrUrl).then((res) => res.json()).then((data) => {
        return data
    })

    return result
}

const main_row2 = document.querySelector('#main_row2')


async function outBooks() {
    let books = await fetchApi()

    books.forEach(element => {
        let $divBook = `
                <div class="div_book">
                    <div class="book_header">
                        <h2>${element['title']}</h2>
                        <p>${element['author']}-${element['dtRelease']}</p>
                    </div>
                    <img src="bd/${element['img']}" alt="Imagem do livro ${element['title']}" width= 150 height= 250>
                    
                    <div class="book_body">
                        <span class="gener-rating">
                            <span>${element['genre']}</span>
                            <span>${element['rating']}⭐</span>
                        </span>
                        
                        <br>
                        
                        <p>
                            ${element['comment']}
                        </p>
                    </div>
                </div>
        `
        main_row2.insertAdjacentHTML('beforeend', $divBook)
    })

}

outBooks()
