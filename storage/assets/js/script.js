function test() {
    let testText = "HelloOoo!:) This is the Basicis Framework!"

    console.log(testText)
    if (!localStorage.getItem("testText")) {
        alert(testText)
        localStorage.setItem("testText", testText)
    }
}

document.addEventListener("load", test())