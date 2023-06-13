class Alert {
  constructor(type, text) {
    this.type = type
    this.text = text
  }

  create() {
    let div = document.createElement('div')
    div.className = `alert alert-${this.type}`
    div.innerHTML = this.text
    div.innerHTML += '<button type="button" class="close" onclick="return this.parentElement.remove()">&times;</button>'

    return div
  }
}