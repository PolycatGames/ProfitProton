let usedIdeas = [];
        const niches = ["freelancing", "dropshipping"]; // Add other niches here

        function getRandomNiche() {
            const availableNiches = niches.filter(niche => !usedIdeas.includes(niche));
            if (availableNiches.length === 0) {
                usedIdeas = [];
                return getRandomNiche();
            }
            const randomIndex = Math.floor(Math.random() * availableNiches.length);
            return availableNiches[randomIndex];
        }

        function getRandomIdeaFromFile(niche) {
            return fetch(`/data/business-ideas/${niche}.txt`)
                .then(response => response.text())
                .then(data => {
                    const ideas = data.split("\n").filter(idea => !usedIdeas.includes(idea));
                    if (ideas.length === 0) {
                        usedIdeas = [];
                        return getRandomIdeaFromFile(niche);
                    }
                    const randomIndex = Math.floor(Math.random() * ideas.length);
                    const randomIdea = ideas[randomIndex];
                    usedIdeas.push(randomIdea);
                    return randomIdea;
                })
                .catch(error => {
                    console.error("Error fetching business ideas:", error);
                    return "Oops! Something went wrong.";
                });
        }

        function generateBusinessIdea() {
            const selectedNiche = document.getElementById("select-niche").value;

            if (selectedNiche === "") {
                // If "Any Niche" is selected, pick a random niche first
                const randomNiche = getRandomNiche();
                getRandomIdeaFromFile(randomNiche)
                    .then(idea => {
                        document.getElementById("business-idea").textContent = idea;
                    });
            } else {
                // If a specific niche is selected, directly get an idea from that niche
                getRandomIdeaFromFile(selectedNiche)
                    .then(idea => {
                        document.getElementById("business-idea").textContent = idea;
                    });
            }
        }