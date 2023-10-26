async function checkConnected() {
    const provider = window.ethereum;

    if (provider && provider.isMetaMask) {
        const address = provider.selectedAddress;

        if (address) {
            document.getElementById("account").innerHTML = address;
            console.log(address);
            return;
        }
    }
    console.log("Not connected or not using MetaMask");
}

async function connect() {
    const provider = window.ethereum;

    if (provider && provider.isMetaMask) {
        try {
            const accounts = await provider.request({ method: 'eth_requestAccounts' });
            const account = accounts[0];
            document.getElementById("account").innerHTML = account;
            console.log(account);
        } catch (error) {
            console.error(error);
        }
    } else {
        console.log("No MetaMask detected.");
    }
}

// Check connection on page load
window.addEventListener('load', checkConnected);
