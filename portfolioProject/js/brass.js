function createHamburgerMenu() {
    let nav = document.querySelector("#mainNavigation");
    if (nav.className === "navbar") {
        nav.className += " responsive";
        document.querySelector("i").style.overflow = "hidden";
    } else {
        nav.className = "navbar";
    }
}

//GET COOKIE FUNCTION FOR DIGITAL DOWNLOAD

function getCookie(tag) {
    let value = null
    let myCookie = document.cookie + ";"
    let findTag = tag + "="
    let endPos
    if (myCookie.length > 0 ) {
      let beginPos = myCookie.indexOf(findTag)
      if (beginPos != -1) {
        beginPos = beginPos + findTag.length
        endPos = myCookie.indexOf(";", beginPos)
        if (endPos == -1)
          endPos = myCookie.length
        value = unescape(myCookie.substring(beginPos, endPos))
      }
    } 
   return value   
  }
