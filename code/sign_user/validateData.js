function getRegex(key) {
    fetch('regex.json')
        .then((response) => {
            response.json().then((regexStrings) => {
                return regexStrings[key];               
            })
        });
}
