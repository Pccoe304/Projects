from lxml import etree

def validate_xml(xml_file, xsd_file):
    try:
        # Parse XML and XSD files
        xml_doc = etree.parse(xml_file)
        xsd_doc = etree.parse(xsd_file)
        schema = etree.XMLSchema(xsd_doc)

        # Validate XML against XSD
        if schema.validate(xml_doc):
            print("XML is valid according to the schema.")
        else:
            print("XML validation failed.")
            for error in schema.error_log:
                print(f"Line {error.line}: {error.message}")
    except Exception as e:
        print(f"Error: {e}")

# File paths
xml_file = "bakery.xml"
xsd_file = "bakery.xsd"

# Validate
validate_xml(xml_file, xsd_file)
