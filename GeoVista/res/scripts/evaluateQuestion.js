document.addEventListener("DOMContentLoaded", function () {
    const questionForm = document.getElementById("questionForm");
    const checkQuestionButton = document.getElementById("checkQuestionButton");
    const radios = questionForm.querySelectorAll('input[type="radio"]');

    //Initially disable check question button
    if(questionForm.getAttribute("quizState") === "active") checkQuestionButton.disabled = true;

    // Enable the button when a radio button is selected
    radios.forEach((radio) => {
        radio.addEventListener("change", () => checkQuestionButton.disabled = false);
    });

    if(questionForm.getAttribute("quizState") === "active") checkQuestionButton.addEventListener("click", (event) => {
        event.preventDefault();
        checkQuestionButton.disabled = true;
        let answeredCorrectly = false;

        //Select all radio buttons in the form
        const radios = questionForm.querySelectorAll('input[type="radio"]');

        //Find the selected one
        radios.forEach((radio) => {
            const label = document.querySelector('label[for="' + radio.id + '"]');
            if (radio.checked) {
                if (radio.getAttribute("data-correct") === "true") {
                    answeredCorrectly = true;
                    label.classList.add("bg-success");
                } else {
                    label.classList.add("bg-danger");
                }
            }

            //Highlight correct answer
            if (radio.getAttribute("data-correct") === "true" && !answeredCorrectly) {
                label.classList.add("bg-success");
            }
        });

        if (!document.getElementById("evaluationText")) {
            const evaluationText = document.createElement("div");
            evaluationText.classList.add("alert", "m-2", "text-center");
            if (answeredCorrectly) evaluationText.classList.add("alert-success");
            else evaluationText.classList.add("alert-danger");
            evaluationText.id = "evaluationText";
            evaluationText.innerHTML = (answeredCorrectly) ? "Richtig beantwortet!" : "Falsch beantwortet!";
            questionForm.appendChild(evaluationText);
        }

        if (!document.getElementById("nextButton")) {
            const nextButton = document.createElement("button");
            nextButton.type = "submit";
            nextButton.className = "btn btn-primary";
            nextButton.name = "next";
            nextButton.value = "1";
            nextButton.id = "nextButton";
            nextButton.innerHTML = "Weiter";

            questionForm.appendChild(nextButton);
        }
    });

});    