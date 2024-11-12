import json
import sys
import os

def get_resource_path(relative_path):
    """ Get the absolute path to a resource in an executable or normal environment. """
    if hasattr(sys, '_MEIPASS'):
        return os.path.join(sys._MEIPASS, relative_path)
    return os.path.join(os.path.abspath("."), relative_path)

def read_words(txt_file):
    encodings = ['utf-8', 'latin-1', 'cp1252']
    for enc in encodings:
        try:
            with open(txt_file, 'r', encoding=enc) as file:
                content = file.read()
            if '=' in content:
                content=content.replace("="," ").split()
            if '\n' in content:
                content=content.replace("\n"," ").split()
            break  # Exit the loop if successful
        except UnicodeDecodeError:
            print(f"Failed with encoding: {enc}")
    return content

def append_words (txt_file,txt):
    txt_file = txt_file.replace(".", " ").split()
    if txt_file[1] == "txt":
        encodings = ['utf-8', 'latin-1', 'cp1252']
        for enc in encodings:
            try:
                # Open the file in append mode ('a') instead of write mode ('w')
                with open(f"{txt_file[0]}.txt", 'a', encoding=enc) as file:
                    # Write the text followed by a newline character to add each entry on a new line
                    file.write(txt + "\n")
                break  # Exit the loop if successful
            except UnicodeDecodeError:
                print(f"Failed with encoding: {enc}")
    
    # elif txt_file[1] == "json":
        
    #     file_path = f"{txt_file[0]}.json"
    #     # Check if the file exists; if not, create it with empty JSON data
    #     if not os.path.exists(file_path):
    #         with open(file_path, 'w') as file:
    #             json.dump({}, file, indent=4)
        
    #     # Prepare the new text as a JSON key-value pair
    #     new_text = txt.replace("-", " ").split()
    #     new_text = {new_text[0]: new_text[1]}
        
    #     # Open the JSON file in write mode to update it with new data
    #     with open(file_path, 'w') as file:  # Use file_path here
    #         json.dump(new_text, file, indent=4)

    else:
        print("error")
        



