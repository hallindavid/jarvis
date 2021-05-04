package main

import (
	"bufio"
	"fmt"
	"os"
)

func main() {
	fmt.Println("Simple Shell")
	fmt.Println("------")
	scanner()
}

func scanner() {
	scanner := bufio.NewScanner(os.Stdin)
	for scanner.Scan() {
		fmt.Print(scanner.Text())
	}

	if scanner.Err() != nil {
		// handle error.
	}
}
