function updateProfileElements(account) {
    document.getElementById("account").innerHTML = account;
    document.getElementById("accountAvatar").innerHTML = `
        <a href="dashboard?address=${account}" class="-m-1.5 p-1.5">
            <span class="sr-only">Your profile</span>
            <img class="h-8 w-8 rounded-full bg-gray-800" 
                 src="https://cdn.stamp.fyi/avatar/eth:${account}" 
                 alt="Avatar for ${account}">
        </a>`;
    console.log(account);
}

function hideProfileElements() {
    document.getElementById("account").innerHTML = '';
    document.getElementById("accountAvatar").innerHTML = '';
}

async function checkConnected() {
    const provider = window.ethereum;

    if (provider && provider.isMetaMask) {
        const address = provider.selectedAddress;

        if (address) {
            updateProfileElements(address);
            return;
        }
    }

    hideProfileElements();
    console.log("Not connected or not using MetaMask");
}

async function connect() {
    const provider = window.ethereum;

    if (provider && provider.isMetaMask) {
        try {
            const accounts = await provider.request({ method: 'eth_requestAccounts' });
            const account = accounts[0];

            if (account) {
                updateProfileElements(account);
                return;
            }
        } catch (error) {
            console.error(error);
        }
    }

    hideProfileElements();
    console.log("No MetaMask detected or not connected.");
}

// Check connection on page load
window.addEventListener('load', checkConnected);