function getRegex() {
    fetch('regex.json')
        .then((response) => {
            console.log(response);
            response.json().then((regexStrings) => {
                console.log(regexStrings)
                return regexStrings;               
            })
        });
}

window.onload = () =>{
    let btn = document.querySelector('#btn_enviar');
    getRegex()
}