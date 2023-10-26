async function checkConnected() {
    if (window.ethereum) {
        // Check if user is already connected
        const address = window.ethereum.selectedAddress;
        if (address) {
            document.getElementById("account").innerHTML = address;
            console.log(address);
            return;
        }
    }
    console.log("Not connected");
}

async function connect() {
    if (window.ethereum) {
        await window.ethereum.request({method: "eth_requestAccounts"});
        window.web3 = new Web3(window.ethereum);
        const accounts = await window.web3.eth.getAccounts();
        const account = accounts[0];
        document.getElementById("account").innerHTML = account;
        document.getElementById("accountAvatar").innerHTML = "https://cdn.stamp.fyi/avatar/eth:" + account;
    } else {
        console.log("No wallet");
    }
}

// Check connection on page load
window.addEventListener('load', checkConnected);
