    function openModal() {
        document.getElementById('bidModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('bidModal').classList.add('hidden');
    }

    function submitBid() {
        const amount = document.getElementById('bidAmount').value;
        if (amount) {
            alert("Your bid: " + amount);
            closeModal();
            // T9dr tdir POST l-database hna b AJAX / Fetch ila bghiti
        } else {
            alert("Please enter a bid amount.");
        }
    }
